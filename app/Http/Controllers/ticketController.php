<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
        $clientId = Client::where('id_User', $user)->first(); 
        $notificationTicket = Reservation::with('client.user', 'voyage.guide.user')
        ->where('Client_id', $clientId->id)
        ->where('status', 1)
        ->where('voyage->date','>', now())
        ->orderByDesc('id')
        ->get();
        return view('Client.ticketNot',compact('notificationTicket'));
    }
    
    public function pdf()
{
    $user = Auth::user();
    if ($user) {
        $clientId = Client::where('id_User', $user->id)->first(); 
        if ($clientId) {
            $data = Reservation::with('client.user', 'voyage.guide.user')
                ->where('Client_id', $clientId->id)
                ->where('status', 1)
                ->orderByDesc('id')
                ->get();
                
            $pdf = PDF::loadView('pdf', compact('data'));
 
            return $pdf->stream('akil.pdf');
        }
    }
}


    // public function ticket(){
    // $user = Auth::user();
    //     if ($user) {
    //         $clientId = Client::where('id_User', $user->id)->first(); 
    //         if ($clientId) {
    //             $data = Reservation::with('client.user', 'voyage.guide.user')
    //                 ->where('Client_id', $clientId->id)
    //                 ->where('status', 1)
    //                 ->orderByDesc('id')
    //                 ->get();
    //                 return view('ticket',compact('data'));
    //         }
    //     }
    // }

  
    //    public function pdf(){

    //        $pdf = Pdf::loadView('pdf');
 
    //        return $pdf->stream('akil.pdf');
    
    //    }
}
