<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class stripeController extends Controller
{
    public function checkout(){
        return view('Checkout');
    }


    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $CheckoutForm = "CheckoutForm";
        $totalprice = $request->input('totalAmount') * 100; // Convertir en cents, car Stripe utilise les centimes comme unité
        $total = $totalprice;

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $CheckoutForm,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity' => 1, // Pour un seul article représentant le prix total
                ],
            ],
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => route('checkout.success'), // Redirection après le paiement réussi
            'cancel_url' => route('checkout.cancel'), // Redirection après l'annulation du paiement
        ]);

        if ($session) {
            return redirect()->to($session->url); // Redirection vers l'URL de paiement Stripe
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }




        public function paymentSuccess()
        {
            return redirect()->back()->with('success', 'Thanks for your order! You have just completed your payment.');
        }

        public function paymentCancel()
        {
            return redirect()->back()->with('error', 'Your payment was canceled.');
        }

    
    }
    
 



