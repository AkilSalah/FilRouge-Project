<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'client_id',
    ];
    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
