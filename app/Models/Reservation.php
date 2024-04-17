<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'Client_id',
        'voyage_id',
        'status',
    ];
    public function client(){
        return $this->belongsTo(Client::class, 'Client_id');
    }
    public function voyage(){
        return $this->belongsTo(Voyage::class, 'voyage_id');
    }
}
