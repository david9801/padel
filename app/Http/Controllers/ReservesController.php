<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendConfirmation;

class ReservesController extends Controller
{
    public function index()
    {
                $today = Carbon::now();
                $weekAgo = $today->subDays(7);
                //para no poner en la pagina reservas de hace muchos dias establecemos el dia actual -7 dias para mostrar reservas, aunque podria ser value:1
        $user = auth()->user();
        $reservations_fe = $user->reserveS()->where('day', '>=', $weekAgo)->get();
        return view('reserve.reserves', compact('reservations_fe',));
    }


    public function create()
    {
        return view('reserve.create');
    }

    public function send(){
        return view('reserve.send');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'shift_id' => 'required|exists:shifts,id',
            'day' => 'required|date|after:tomorrow',
        ], [
            'shift_id.required' => 'Por favor, selecciona un turno válido',
            'shift_id.exists' => 'Lo sentimos, este turno no existe',
            'day.required' => 'Por favor, selecciona una fecha',
            'day.date' => 'Por favor, selecciona una fecha valida',
            'day.after' => 'Por favor, selecciona una fecha en la que puedas venir, este día ya ha pasado',
        ]);


        // Verificar si ya existe una reserva para el turno y el día dados
        $existingReservation = Reserve::where('shift_id', $validatedData['shift_id'])
            ->where('day', $validatedData['day'])
            ->first();

        if ($existingReservation) {
            // Agregar un error de validación personalizado si ya existe una reserva
            $request->validate([
                'shift_id' => 'unique:reserves,shift_id,NULL,id,day,' . $validatedData['day'],
            ], [
                'shift_id.unique' => 'Ya hay una reserva para este turno en este día, prueba otro por favor ',
            ]);
        }

        $reserve = new Reserve();
        $reserve->shift_id = $validatedData['shift_id'];
        $reserve->email = Auth::user()->email;
        $reserve->day = $validatedData['day'];
        $reserve->user_id = Auth::user()->id;
        $reserve->save();
        $reservation = $reserve;
        Mail::to($reserve->email)->send(new SendConfirmation($reservation));
        return redirect()->route('reserves.index')->with('success', 'Reservation created successfully.');
    }




    public function destroy($id)
    {
        $reservation = Reserve::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reserves.index')->with('success', 'Reservation deleted successfully.');
    }




}
