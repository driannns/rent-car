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
        Schema::create('car_has_categories', function (Blueprint $table) {
            $table->string('id_car');
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger('id_categories')->unsigned();
            $table->foreign('id_categories')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_has_categories');
    }
};
