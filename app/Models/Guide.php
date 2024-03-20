<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_User'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_User');
    }
    public function voyages(){
        return $this->hasMany(Voyage::class, 'guide_id');
    }
}
