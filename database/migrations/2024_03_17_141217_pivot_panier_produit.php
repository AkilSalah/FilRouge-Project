<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('panier_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panier_id')->constrained('paniers')->onDelete('cascade');
            $table->foreignId('produit_id')->constrained('products')->onDelete('cascade');
            $table->unsignedInteger('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
