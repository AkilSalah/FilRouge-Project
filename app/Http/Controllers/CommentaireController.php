<?php

namespace App\Http\Controllers;

use App\Http\Requests\commentsRequest;
use App\Models\Article;
use App\Models\Client;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($articleId)
    {
    $comments = Commentaire::with('article.client.user')->get();    
    $article = Article::with('client.user','theme')->find($articleId);
    if (!$article) {
        abort(404);
    }
    return view('Client.articleDetails', compact('article', 'comments'));
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
    public function store(commentsRequest $request , $articleId)
    {
        $user = Auth::user()->id;
        $client = Client::where('id_User', $user)->first();
        $article = Article::findOrFail($articleId);
        $validateData = $request->validated();
         Commentaire::create([
            'commentaire' => $validateData['comment'],
            'article_id' => $article->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
