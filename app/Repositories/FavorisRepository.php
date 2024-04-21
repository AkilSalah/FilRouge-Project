<?php 

namespace App\Repositories;

use App\Models\Client;
use App\Models\Favoris;
use Illuminate\Support\Facades\Auth;

class FavorisRepository implements FavorisRepositoryInterface {

    public function index (){
        $userId = Auth::user()->id;
        $client = Client::where('id_User', $userId)->first();
        $favoris = Favoris::where('client_id', $client->id)->get();
        return view('Client.favoris' ,compact('favoris'));
    }
    public function store($clientId, $productId) {
        Favoris::create([
            'client_id' => $clientId,
            'product_id' => $productId,
        ]);
    }
    public function destroy(Favoris $favoris) {

        $favoris->delete();
    }

}