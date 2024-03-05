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
        Schema::create('pontuacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('3');
            $table->tinyInteger('4');
            $table->tinyInteger('5');
            $table->tinyInteger('6');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontuacoes');
    }
};
