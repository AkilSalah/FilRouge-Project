<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'articleTags',
        'theme_id',
        'client_id',
    ];
    public function theme(){
        return $this->belongsTo(Theme::class, 'theme_id');
    }
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
