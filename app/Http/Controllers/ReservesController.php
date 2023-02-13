<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendConfirmation;
use DateTime;
class ReservesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        //nos aseguremos que el user esté autenticado (deberia funcionar igual)
        //$reservations_fe = Reserve::all(); cambiamos coger todas las reservas por solo las reservas del usuario en concreto
        $reservations_fe = $user->reserveS;


        return view('reserve.reserves', compact('reservations_fe'));
    }

    public function create()
    {
        return view('reserve.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'court_number' => 'required',
            'email' => 'required|email',
        ]);
        //$reservation = Reserve::create($validatedData);con esto "funciona"
        //$reservation = Reserve::create($validatedData);
        //Añado los datos uno a uno a la reserva para no tener problemas con user_id, que es el mismo que el id de la tabla user
        $reserve = new Reserve();
        $reserve->title = $request->title;
        $reserve->start_time = $request->start_time;
        $reserve->end_time = $request->end_time;
        $reserve->court_number = $request->court_number;
        $reserve->email = $request->email;
        $reserve->user_id = Auth::user()->id;
        $reserve->save();
        $reservation=$reserve;
        Mail::to($reserve->email)->send(new SendConfirmation($reservation));
        return redirect()->route('reserves.index')->with('success', 'Reservation created successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reserve::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reserves.index')->with('success', 'Reservation deleted successfully.');
    }

    public function time($start_time)
    {
        $date = DateTime::createFromFormat('d-m-Y-H:i', $start_time);
        $formatted_date = $date->format('Y-m-d\TH:i');
        $formatted_date_f = $date->modify('+1 hour')->format('Y-m-d\TH:i');
        return view('reserve.send', [
            'formatted_date' => $formatted_date,
            'formatted_date_f' => $formatted_date_f
        ]);
    }


}
