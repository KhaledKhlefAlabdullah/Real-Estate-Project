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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->enum('availableFor',['rent','sale']);
            $table->enum('state',['available','notAvailable']);
            $table->text('description');
            $table->text('address');
            $table->point('location');
            $table->string('price');
            $table->string('realEstateType_id');
            $table->foreign('realEstateType_id')->references('id')->on('real_estate_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estaes');
    }
};
