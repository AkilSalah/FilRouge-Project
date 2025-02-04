<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use App\Models\Voyage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::count();
        $category = Categories::count();
        $voyage = Voyage::count();
        $users = User::where('role', 'Client')
        ->orWhere('role', 'Guide')
        ->get();
       return view('Admin.dashboard',compact('products', 'category', 'voyage','users'));
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
        return redirect()->back()->with('success', 'The trip has been published successfully.');
    }

    public function tripDelete($trip){
        $trip = Voyage::findOrFail($trip);
        $trip->delete();
        return redirect()->back()->with('success', 'The trip has been deleted successfully.');
    }

    public function blockAccess(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        if($user->status == 'Unblocked'){
         $user->update([
            'status' => 'Blocked',
        ]);   
        }else{
            $user->update([
               'status' => 'Unblocked',
            ]);
        }
        return redirect()->back()->with('success', 'User access has been successfully updated.');
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
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
