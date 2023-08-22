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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('first_name');
            // $table->string('middle_name');
            // $table->string('last_name');
            $table->text('full_name');
            $table->text('front_image');
            $table->text('back_image');
            $table->text('personal_image')->nullable();
            $table->string('mobile');
            $table->date('birth_date');
            $table->string('country');
            $table->string('bank_account');
            $table->string('bank_name');
            $table->enum('gender',['male','female'])->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
