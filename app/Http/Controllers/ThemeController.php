<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::with('tag')->get();
        return view('Admin/theme',compact('themes')); 
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
            'title' => 'required',
            'image' => 'required',
            'description' =>'required',
            'tags' => 'required|array',
        ]);
        $imagePath = $request->file('image')->store('public/images/themes');
        $relativeImagePath = str_replace('public/', 'storage/',$imagePath);
        Theme::create([
            'title' => $request->title,
            'image' => $relativeImagePath,
            'description' => $request->description,
        ]);
        $tags = explode(',', $request->input('tags')[0]);
        foreach ($tags as $tag) {
            $tag = trim($tag);
            Tag::create([
                'theme_id' => Theme::latest()->first()->id,
                'tag' => $tag,
            ]);
        }
        return redirect()->back();
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->back();
    }
}
