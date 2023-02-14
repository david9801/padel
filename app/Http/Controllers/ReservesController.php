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

    public function send(){
        return view('reserve.send');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'shift_id' => 'required|exists:shifts,id',
            'day' => 'required|date',
        ]);

        $reserve = new Reserve();
        $reserve->shift_id = $validatedData['shift_id'];
        $reserve->email = Auth::user()->email;
        $reserve->day = $validatedData['day'];
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




}
