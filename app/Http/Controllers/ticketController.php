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
        ->whereHas('voyage', function($query) {
        $query->where('date', '>', now());
        })
        ->orderByDesc('id')
        ->get();
        return view('Client.ticketNot', compact('notificationTicket'));
    }
    
    
    public function pdf($id)
    {
    $user = Auth::user();
    if ($user) {
        $clientId = Client::where('id_User', $user->id)->first(); 
        if ($clientId) {
            $data = Reservation::with('client.user', 'voyage.guide.user')
                ->where('Client_id', $clientId->id)
                ->where('status', 1)
                ->where('id', $id) 
                ->orderByDesc('id')
                ->get();
            $pdf = PDF::loadView('pdf', compact('data'));
 
            return $pdf->stream('akil.pdf');
        }
    }
}


}
