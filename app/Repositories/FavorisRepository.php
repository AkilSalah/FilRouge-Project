<?php 

namespace App\Repositories;

use App\Models\Client;
use App\Models\Favoris;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavorisRepository implements FavorisRepositoryInterface {

    public function index (){
        $userId = Auth::user()->id;
        $client = Client::where('id_User', $userId)->first();
        $favoris = Favoris::with('product','client')->where('client_id' ,$client->id) ->get();
        return view('Client.favoris', compact('favoris'));
    }
    public function store($productId, $clientId) {
            $user = Auth::user()->id;
            $clientId = Client::where('id_User',$user)->first();
            $clientId = $clientId->id;
            $existingFavoris = Favoris::where('product_id', $productId)
                                ->where('client_id', $clientId)
                                ->first();
        if($existingFavoris){
            $existingFavoris->delete();
            return redirect()->back()->with('Product already exists in Favoris ');
        }   else{

            Favoris::create([
                'product_id' => $productId,
                'client_id' => $clientId,
            ]);
        }                     
    }

}