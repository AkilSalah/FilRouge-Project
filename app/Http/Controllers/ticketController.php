<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
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
        ->orderByDesc('id')
        ->get();
        dd($notificationTicket);
        return view('Client.ticket',compact('notificationTicket'));
    }
    // public function index1(){
    //     $user = Auth::user()->id;
    //     $clientId = Client::where('id_User', $user)->first(); 
    //     $reservationTicket = Reservation::with('client.user', 'voyage.guide.user')
    //     ->where('Client_id', $clientId->id)
    //     ->where('status', 1)
    //     ->orderByDesc('id')
    //     ->get();
   
    //    return view('Client.ticket',compact('reservationTicket'));
    //    }
}
