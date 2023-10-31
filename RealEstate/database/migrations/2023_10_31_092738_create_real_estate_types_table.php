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
        Schema::create('real_estate_types', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->enum('realEstateKind',['land','ground_floor_house','apartment','basement']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estae_types');
    }
};
