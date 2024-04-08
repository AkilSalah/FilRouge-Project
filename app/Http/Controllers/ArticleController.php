<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Client.article');
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
    public function store(ArticleRequest $request , $themeId)
    {

        $user = Auth::user()->id;
        $client = Client::where('id_User', $user)->first();
        $validatedData = $request->validated();

        $imagePath = $request->file('image')->store('public/images/articles');
        $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

        $article = Article::create([
            'title' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $relativeImagePath,
            'client_id' => $client->id,
            'theme_id' => $request->input('themeId'),
        ]);
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
