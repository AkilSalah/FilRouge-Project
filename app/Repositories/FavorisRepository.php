<?php 

namespace App\Repositories;

use App\Models\Client;
use App\Models\Favoris;
use Illuminate\Support\Facades\Auth;

class FavorisRepository implements FavorisRepositoryInterface {

    public function index (){
        $userId = Auth::user()->id;
        $client = Client::where('id_User', $userId)->first();
        $favoris = Favoris::with('product','client')->where('client_id' ,$client->id_User) ->get();
        return view('Client.favoris', compact('favoris'));
    }
        public function store($clientId, $productId) {
        $existingFavoris = Favoris::where('product_id', $productId)
                                ->where('client_id', $clientId)
                                ->first();
        if($existingFavoris){
            return redirect()->back()->with('Product already exists in Favoris ');
        }   else{

            Favoris::create([
                'client_id' => $clientId,
                'product_id' => $productId,
            ]);
        }                     
    }
    public function destroy(Favoris $favoris) {

        $favoris->delete();
    }

}