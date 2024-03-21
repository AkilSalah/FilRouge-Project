<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    protected $fillable = [
        'guide_id',
        'image',
        'title',
        'description',
        'nbPlaces',
        'date',
        'lieu',
    ];
    public function guide(){
        return $this->belongsTo(Guide::class, 'guide_id');
    }
    public function reservation(){
        return $this->hasMany(Reservation::class, 'voyage_id');
    }


}
