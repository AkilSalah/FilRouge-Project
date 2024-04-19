<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'panier_id',
        'date',
    ];
    public function panier(){
        return $this->belongsTo(Panier::class, 'panier_id');
    }
}
