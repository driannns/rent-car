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
        Schema::create('cars', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->unique();
            $table->string('deskripsi');
            $table->bigInteger('id_category')->unsigned()->index()->nullable();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('bbm');
            $table->bigInteger('harga');
            $table->string('picture');
            $table->enum('status', ['Available', 'Unavailable'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
