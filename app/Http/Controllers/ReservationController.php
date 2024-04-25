<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tripId)
    {
    $trip = Voyage::with('guide.user')
    ->where('id' ,$tripId)
    ->first();
    return view('Client.reservation',compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $client = Client::where('id_User', $user)->first();
        $tripId = $request->input('tripId');
        $trip = Voyage::find($tripId);

        $existReservation = Reservation::where('Client_id',$client->id)
        ->where('voyage_id', $tripId)
        ->first();
        if( $client && !$existReservation && $trip && $trip->nbPlaces > 0) {

            $reservation = Reservation::create([
                'Client_id' => $client->id,
                'voyage_id' => $tripId,
            ]);
            $trip->nbPlaces -= 1;
            $trip->save();
            return redirect()->back()->with('success', 'Reservation added successfully');
        }else{
            return redirect()->back()->with('error', 'Unable to create reservation. Check availability.');
        }
        


    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
