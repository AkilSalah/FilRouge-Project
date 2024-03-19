<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Client'
    ];
    public function client(){
        return $this->belongsTo(Client::class, 'id_Client');
    }
    public function products()
    {
        return $this->belongsToMany(Products::class, 'panier_produit', 'panier_id', 'produit_id')
            ->withPivot('quantite');
    }

}
