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
        Schema::create('detail_ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venteId');
            $table->foreign('venteId')->references('id')->on('ventes');

            $table->unsignedBigInteger('produitId');
            $table->foreign('produitId')->references('id')->on('produits');

            $table->integer("prix");
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ventes');
    }
};
