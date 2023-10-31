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
        Schema::create('reacts', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->boolean('isLiked')->default(false);
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('realEstate_id');
            $table->foreign('realEstate_id')->references('id')->on('real_estates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reacts');
    }
};
