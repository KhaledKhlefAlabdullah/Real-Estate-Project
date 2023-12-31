<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('whatsapp')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_img')->nullable()->default('images/profile_images/user.png');
            $table->string('personal_card_img')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $password=password_hash('adminManager@1',PASSWORD_DEFAULT);
        DB::table('users')->insert([
            'id'=>Hash::make('Admin Manager'),
            'name'=>'admin',
            'email'=>'adminManager@gmail.com',
            'phone_number'=>'00000000',
            'password'=>$password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
