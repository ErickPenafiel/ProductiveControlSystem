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
        Schema::create('temperatura_cocimientos', function (Blueprint $table) {
            $table->id();
            $table->float('temperatura', 8, 2);
            $table->unsignedBigInteger('cocimiento_id');
            $table->foreign('cocimiento_id')->references('id')->on('cocimientos');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperatura_cocimientos');
    }
};
