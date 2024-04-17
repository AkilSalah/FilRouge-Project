<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Client;
use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $themeId)
{
    $theme = Theme::find($themeId);
    $tags = Tag::where('theme_id', $themeId)->get();
    
    $articlesQuery = Article::with('client.user')->where('theme_id', $themeId);

    if ($request->has('tag')) {
        $tagId = $request->input('tag');
        $articlesQuery->where('articleTags', 'LIKE', '%' . $tagId . '%');
    }

    $articles = $articlesQuery->get();

    return view('Client.article', compact('theme', 'articles', 'tags'));
}



    // public function filter(Request $request)
    // {
       
    //     $tag = $request->input('tag');
    //     $articles = Article::whereJsonContains('articleTags', $tag)->get();
        
       
    
    //     return response()->json($articles);
    // }
    
    
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request )
    {

        $user = Auth::user()->id;
        $client = Client::where('id_User', $user)->first();
        $validatedData = $request->validated();

        $imagePath = $request->file('image')->store('public/images/articles');
        $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

        $tagIds = $request->input('tags');

        Article::create([
            'title' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $relativeImagePath,
            'client_id' => $client->id,
            'theme_id' => $request->input('themeId'),
            'articleTags' => json_encode($tagIds),

        ]);
        
        return redirect()->back()->with('success', 'The article has been created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(ArticleRequest $request, Article $article)
    {
        $user = Auth::user()->id;

        if ($user !== $article->client->id_User) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validated();
        $tagIds = $request->input('tags');

        if ($request->hasFile('image')) {
            if ($article->image && Storage::exists($article->image)) {
                Storage::delete($article->image);
            }

            $imagePath = $request->file('image')->store('public/images/articles');
            $relativeImagePath = str_replace('public/', 'storage/', $imagePath);

            $article->update([
                'image' => $relativeImagePath,
            ]);
        }

        $article->update([
            'title' => $validatedData['name'],
            'description' => $validatedData['description'],
            'articleTags' =>json_encode($tagIds)
        ]);

        return redirect()->back()->with('success', 'The article has been updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $user = Auth::user()->id;

        if ($user !== $article->client->id_User) {
            abort(403, 'Unauthorized action.');
        }

        $article->delete();
        return redirect()->back()->with('success', 'The article has been deleted successfully.');
    }
}
