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
        Schema::create('contracts', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('firstTeam_id');
            $table->string('secondTeam_id');
            $table->string('realEstate_id');
            $table->foreign('firstTeam_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('secondTeam_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('realEstate_id')->references('id')->on('real_estates')->onDelete('cascade');
            $table->text('contract_details');
            $table->enum('contract_kind',['rent','sale']);
            $table->date('expiry_date');
            $table->integer('commission');
            $table->integer('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
