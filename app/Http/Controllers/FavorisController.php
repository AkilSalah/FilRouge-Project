<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use Illuminate\Http\Request;
use App\Repositories\FavorisRepositoryInterface;


class FavorisController extends Controller
{
    protected $favorisRepository;
    public function __construct(FavorisRepositoryInterface $favorisRepository){
        $this->favorisRepository = $favorisRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return $this->favorisRepository->index();
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
    public function store($productId, $clientId)
    {
        
        $this->favorisRepository->store($clientId, $productId);
        return redirect()->back()->with('success', 'Successfully stored product in favorites');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Favoris $favoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favoris $favoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favoris $favoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favoris $favoris)
    {
        $this->favorisRepository->destroy($favoris);
        return redirect()->back()->with('success', 'Successfully removed product from favorites');
    }
}
