<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_User'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_User');
    }
    public function panier(){
        return $this->hasOne(Panier::class,'id_Client');
    }
    public function reservation(){
        return $this->hasMany(Reservation::class,'Client_id');
    }
}
