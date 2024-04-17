<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Reservation;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guide = Auth::user()->id;
        $guideId = Guide::where('id_User', $guide)->first();
        $trips = Voyage::withCount('reservation')
        ->where('guide_id', $guideId->id)
        ->get();
        return view('Guide.dashboard',compact('trips'));
    }

    public function acceptation(Request $request)
    {
     $guide = Auth::user()->id;
     $guideId = Guide::where('id_User', $guide)->first(); 
    $tripReserves = Reservation::with('client.user','voyage.guide')
    ->where('status', false)->get();
    return view('Guide.acceptation', compact('tripReserves'));
    }

    public function acceptReservation(Request $request ,$tripReservation ){
        $reservation = Reservation::findOrFail($tripReservation);
        $reservation->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Reservation accepted successfully!');

    }
    public function deleteReservation( $tripReservation ){
        $reservation = Reservation::findOrFail($tripReservation);
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully!');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        //
    }
}
