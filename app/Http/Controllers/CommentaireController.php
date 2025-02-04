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
    public function index($articleId){
    $article = Article::with('client.user','theme')->find($articleId);
    if (!$article) {
        abort(404);
    }
    $comments = Commentaire::with('article','client')->where('article_id', $articleId)->get();    
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
        $client = Client::where('id_User', Auth::id())->first();
        $article = Article::findOrFail($articleId);
        $validateData = $request->validated();
         Commentaire::create([
            'commentaire' => $validateData['comment'],
            'article_id' => $article->id,
            'client_id' => $client->id,
        ]);
        return redirect()->back()->with('success', 'Comment added successfully!');
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
    public function update(commentsRequest $request, Commentaire $commentaire)
    {
        if(auth()->user()->id !== $commentaire->article->client->user->id) {
            abort(403, 'Unauthorized action.');
        }

        $validateData = $request->validated();
        $commentaire->update([
            'commentaire' => $validateData['comment'],
        ]);
        return redirect()->back()->with('success', 'Comment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
