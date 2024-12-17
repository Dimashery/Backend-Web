<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek apakah tabel sudah ada sebelum membuatnya
        if (!Schema::hasTable('new_products')) {
            Schema::create('new_products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('image');
                $table->text('description');
                $table->string('price');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('new_products');
    }
};