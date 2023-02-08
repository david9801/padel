<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class ReservesController extends Controller
{
    public function index()
    {
        $reservations_fe = Reserve::all();

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

        $reservation = Reserve::create($validatedData);

        return redirect()->route('reserves.index')->with('success', 'Reservation created successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reserve::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reserves.index')->with('success', 'Reservation deleted successfully.');
    }
}
