<?php 
namespace App\Repositories;

use App\Models\Favoris;
interface FavorisRepositoryInterface {
    public function index();
    public function store($productId, $clientId);

}