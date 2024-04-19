<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Client;
use App\Models\Panier;
use App\Models\Products;
use App\Models\Theme;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::with('tag')->get();
        $categories = Categories::all();
        $products = Products::query();
        $products = $products->paginate(4);

        return view('welcome',compact('products','categories','themes'));
    }
    public function search(Request $request)
{
    $query = $request->input('search');
    
    if (empty($query)) {
        return response()->json(['error' => 'Search query is empty'], 400);
    }
    
    $products = Products::with('category')
        ->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('productName', 'like', "%$query%")
                         ->orWhereHas('category', function ($categoryQuery) use ($query) {
                             $categoryQuery->where('categoryName', 'like', "%$query%");
                         });
        })
        ->paginate(4);

    return response()->json($products);
}

    

    public function tripIndex(){
        $trips = Voyage::with('guide.user')
        ->where('is_published' ,1)
        ->get();
        return view('Client.trip',compact('trips'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($ProductId)
    {
        $product = Products::findOrFail($ProductId);
        $productDetails = Products::where('id',$product->id)->first();
        return view('Client.productDetails',compact('productDetails'));
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

        $quantity = $request->input('quantity');

        $existingCartItem = $clientPanier->products()
            ->where('produit_id', $productId)
            ->first();
        if ($existingCartItem) {
            $existingCartItem->pivot->quantite+=$quantity;
            $existingCartItem->pivot->save();
        } else {
            $clientPanier->products()->attach($productId, ['quantite' => $quantity]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    } else {
        return redirect()->route('login.create')->with('error', 'You must be logged in to add products to cart.');
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
