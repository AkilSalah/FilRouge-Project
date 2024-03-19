<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Panier;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::get();
        return view('welcome',compact('products'));
    }

    
    // public function nombreProducts()
    // {
    //     $user = Auth::user()->id;
    //     $idClient = Client::where('id_User', $user)->first(); 
    //     $panier = Panier::where('id_Client', $idClient->id)->first();
    //     $nombreProduct = 0; 
        
    //     if ($panier) {
    //         $nombreProduct = $panier->products->count();
    //     }
    //     return view('welcome', compact('nombreProduct'));
    // }

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
  
public function store(Request $request, $productId)
{
    if (Auth()->check()) {
        $user = Auth::user()->id;
        $client = Client::where('id_User', $user)->first();
        Products::findOrFail($productId);

        if (!$client->panier) {
            $panier = Panier::create(['id_Client' => $client->id]);
            $client->panier()->save($panier);
        }

        $clientPanier = $client->panier;

        $existingCartItem = $clientPanier->products()
            ->where('produit_id', $productId)
            ->first();
        if ($existingCartItem) {
            $existingCartItem->pivot->quantite++;
            $existingCartItem->pivot->save();
        } else {
            $clientPanier->products()->attach($productId, ['quantite' => 1]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    } else {
        return redirect()->route('login')->with('error', 'You must be logged in to add products to cart.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
