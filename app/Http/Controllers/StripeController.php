<?php 
 
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class StripeController extends Controller
{
    
 
    public function session(Request $request )
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        $price = $request->get('price');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $price,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
             $success = 'success_url' => route('success'),
            'cancel_url'  => route('client.panier'),
        ]);
        
        return redirect()->away($session->url);
    }

    public function success()
    {
        $user = Auth::user()->id;
        $idClient = Client::where('id_User', $user)->first();
        
            $clientPanier = $idClient->panier;
            $existingCartItem = $clientPanier->products()->get();
            if($existingCartItem){
                $clientPanier->products()->detach();
            }
            $commande = new Commande();
            $commande->panier_id = $clientPanier->id;
            $commande->date = date('Y-m-d');
            $commande->save();
        
        return view ('Success');
    }
 
    
}