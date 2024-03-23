<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function tag(){
        return $this->hasMany(Tag::class, 'theme_id');
    }
}
