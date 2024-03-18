<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        $products = Products::with('category')->get();
        return view('Admin.produits',compact('products','categories'));
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
        $request->validate([
            'categorie' =>'required',
            'name' =>'required',
            'price' =>'required',
            'image' =>'required',
            'description' =>'required',
        ]);

        $imagePath = $request->file('image')->store('public/images/products');
        $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

        Products::create([
            'id_Category' => $request->categorie,
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productImage' => $relativeImagePath,
            'productDescription' => $request->description
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   

public function update(Request $request, Products $product)
{
    $validateRequest = $request->validate([
        'categorie' => 'required',
        'name' => 'required',
        'price' => 'required',
        'image' => 'image',
        'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
        if ($product->productImage && Storage::exists($product->productImage)) {
            Storage::delete($product->productImage);
        }

        $imagePath = $request->file('image')->store('public/images/products');
        $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

        $product->update([
            'productImage' => $relativeImagePath,
        ]);
    }

    $product->update([
        'id_Category' => $validateRequest['categorie'],
        'productName' => $validateRequest['name'],
        'productPrice' => $validateRequest['price'],
        'productDescription' => $validateRequest['description'],
    ]);

    return redirect()->back()->with('success', 'Produit mis à jour avec succès.');
}

 


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->back();
    }

}
