<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Guide;
use App\Models\Voyage;
use App\Rules\AfterCurrentDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guide = Auth::user()->id;
        $idGuide = Guide::where('id_User', $guide)->first();
        $voyages = Voyage::where('guide_id', $idGuide->id)->get();
        $categories = Categories::all();
        return view('Guide.voyage',compact('categories','voyages'));
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
    $currentDate = now()->toDateString();

    $guide = Auth::user()->id;
    $idGuide = Guide::where('id_User', $guide)->first();
    
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => ['required', new AfterCurrentDate],
        'nbPlaces' => 'required',
        'lieu' => 'required',
        'image' => 'required|image', 
    ]);

    $imagePath = $request->file('image')->store('public/images/voyages');
    $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

    $voyage = Voyage::create([
        'guide_id' => $idGuide->id,
        'image' => $relativeImagePath,
        'title' => $request->title,
        'description' => $request->description,
        'nbPlaces' => $request->nbPlaces,
        'date' => $request->date,
        'lieu' => $request->lieu,
    ]);
    return redirect()->back()->with('success', 'The voyage has been created successfully.');

}


    /**
     * Display the specified resource.
     */
    public function show(Voyage $voyage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voyage $voyage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voyage $voyage)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'nbPlaces' => 'required',
            'lieu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        if ($request->hasFile('image')) {
            if ($voyage->image && Storage::exists($voyage->image)) {
                Storage::delete($voyage->image);
            }
            $imagePath = $request->file('image')->store('public/images/voyages');
            $relativeImagePath = str_replace('public/', 'storage/', $imagePath);
    
            $voyage->image = $relativeImagePath;
        }
        $voyage->title = $request->title;
        $voyage->description = $request->description;
        $voyage->nbPlaces = $request->nbPlaces;
        $voyage->date = $request->date;
        $voyage->lieu = $request->lieu;
    
        $voyage->save();

        return redirect()->back()->with('success', 'Trip has been updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voyage $voyage)
    {
        $voyage->delete();
        return redirect()->back()->with('message', 'Voyage has been deleted successfully.');
    }
}
