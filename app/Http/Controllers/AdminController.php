<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Voyage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function tripApproved(){

        $trips = Voyage::with('guide.user')->where('is_published' , 0)->get();
        return view('Admin.tripApproved',compact('trips'));
    }

    public function tripPublished($trip){
        $trip = Voyage::findOrFail($trip);
        $trip->update([
            'is_published' => 1,
        ]);
        return redirect()->back();
    }

    public function tripDelete($trip){
        $trip = Voyage::findOrFail($trip);
        $trip->delete();
        return redirect()->back();
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
