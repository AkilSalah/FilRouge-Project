<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'email'=>'required',
            'password'=>'required'
           ]);
           if(auth()->attempt(['email'=>$validate['email'],'password' => $validate['password']])){
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->route('Admin.dashboard');
            } elseif ($user->role === 'Guide') {
                return redirect()->route('Guide.dashboard');
            } elseif ($user->role === 'Client') {
                return redirect()->route('welcome');
            }
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
