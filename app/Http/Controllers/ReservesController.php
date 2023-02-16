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
        //metodo index para mostrar las reservas de un solo user
                $today = Carbon::now();
                $weekAgo = $today->subDays(7);
                //para no poner en la pagina reservas de hace muchos dias establecemos el dia actual -7 dias para mostrar reservas, aunque podria ser value:1
        $user = auth()->user();
        $reservations_fe = $user->reserveS()->where('day', '>=', $weekAgo)->get();
        return view('reserve.reserves', compact('reservations_fe',));
    }


    public function create()
    {
        //metodo create aprovechado para mostrar las reservas de todos los user-> asi tenemos calendario de reservas y el user ve que turnos/dias hay pista libre
        //aprovechado del resource de ReservesController de web.php para no configurar mas rutas en dicho fichero
        $today = Carbon::now();
        //quiero mostrar las reservas de todos los users con fecha mayor o igual al dia actual
        $reservations_f = Reserve::with('user')
            ->where('day', '>=', $today)
            ->get();
        return view('reserve.create',compact('reservations_f'));
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
            'pista_id' =>'required|exists:pistas,id'
        ], [
            'shift_id.required' => 'Por favor, selecciona un turno válido',
            'shift_id.exists' => 'Lo sentimos, este turno no existe',
            'day.required' => 'Por favor, selecciona una fecha',
            'day.date' => 'Por favor, selecciona una fecha valida',
            'day.after' => 'Por favor, selecciona una fecha en la que puedas venir, este día ya ha pasado',
        ]);

        // Verificar si ya existe una reserva para la pista, turno y día dados
        $existingReservation = Reserve::where('pista_id', $validatedData['pista_id'])
            ->where('shift_id', $validatedData['shift_id'])
            ->where('day', $validatedData['day'])
            ->first();

        if ($existingReservation) {
            // Agregar un error de validación personalizado si ya existe una reserva para la pista, turno y día dados
            $request->validate([
                'pista_id' => 'unique:reserves,pista_id,NULL,id,shift_id,' . $validatedData['shift_id'] . ',day,' . $validatedData['day'],
            ], [
                'pista_id.unique' => 'Lo sentimos, la pista ya ha sido reservada ...',
            ]);
        }

        $reserve = new Reserve();
        $reserve->shift_id = $validatedData['shift_id'];
        $reserve->email = Auth::user()->email;
        $reserve->day = $validatedData['day'];
        $reserve->user_id = Auth::user()->id;
        $reserve->pista_id = $validatedData['pista_id'];
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
