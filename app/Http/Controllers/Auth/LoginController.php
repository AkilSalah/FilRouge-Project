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
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/'],
            'password' => ['required', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*()_+]{8,20}$/'],
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->route('Admin.dashboard');
            } elseif ($user->role === 'Guide' && $user->status === 'Unblocked') {
                return redirect()->route('Guide.dashboard');
            } elseif ($user->role === 'Client' && $user->status === 'Unblocked') {
                return redirect()->route('Client');
            } else {
                return redirect()->route('login.create')->with('error', 'Erreur lors de la connexion.');
            }
        } else {
            return redirect()->route('login.create')->with('error', 'Adresse e-mail ou mot de passe incorrect.');
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
