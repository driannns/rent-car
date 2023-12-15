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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('id_car');
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->string('alamat');
            $table->string('hours');
            $table->string('payment');
            $table->string('price');
            $table->string('startDate');
            $table->string('endDate');
            $table->enum('status', ['Processing', 'Done']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
