<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'commentaire',
        'article_id',
        'client_id'
    ];
    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function client(){
        return $this->belongsTo(Client::class ,'client_id');
    }
}
