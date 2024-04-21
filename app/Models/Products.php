<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'productName',
        'productImage',
        'productDescription',
        'productPrice',
        'id_Category',
    ];
    
    public function category(){
        return $this->belongsTo(Categories::class, 'id_Category');
    }

    public function favoris(){
        return $this->belongsToMany(Products::class, 'favoris', 'client_id','product_id');
    }

}
