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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Agregar la clave foránea para el usuario
            $table->text('img');
            $table->string('select_method');
            $table->decimal('price', 8, 2);
            $table->string('title');
            $table->text('description');
            $table->string('royalties');
            $table->string('size');
            $table->foreignId('collection_id')->constrained();
            $table->string('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
