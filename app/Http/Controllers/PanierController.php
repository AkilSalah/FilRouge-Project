<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user()->id;
    $idClient = Client::where('id_User', $user)->first(); 
    $panier = Panier::where('id_Client', $idClient->id)->first();

    if ($panier) {
        $products = $panier->products;
        return view('Client.panier', compact('products'));
    } else {
        return view('Client.panier', compact('products'))->with('message', 'Votre panier est vide.');
    }
}


    public function deleteFromPanier($idProduct) {
        $user = Auth::user()->id;
        $idClient = Client::where('id_User', $user)->first(); 
        $panier = Panier::where('id_Client', $idClient->id)->first();
        if ($panier) {
            $products = $panier->products;
            foreach ($products as $product) {
                if ($product->id == $idProduct) {
                    $product->pivot->delete();
                }
            }
            return redirect()->back()->with('message', 'Produit supprimé du panier.');
        } else {
            return redirect()->back()->with('message', 'Votre panier est vide.');
        }
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panier $panier)
    {
     
    }
}
