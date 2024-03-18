<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('Admin.categories',compact('categories'));
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
            'categorieName' => 'required',
        ]);
        Categories::create([
            'categoryName' => $request->categorieName,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categorie)
    {
        $validatedData = $request->validate([
            'categorieName' => 'required',
        ]);
    
        $categorie->update([
            'categoryName' => $validatedData['categorieName'],
        ]);
    
        return redirect()->back()->with('success', 'Catégorie mise à jour avec succès.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categorie)
    {
        $categorie->delete();
        return redirect()->back();
    }
}
