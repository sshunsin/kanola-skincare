<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) { 
            $table->id(); 
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('hp')->nullable();
            $table->string('foto')->nullable();
            $table->string('google_id')->nullable(); 
            $table->string('google_token')->nullable(); 
            $table->string('alamat')->nullable(); 
            $table->string('pos')->nullable(); 
            $table->timestamps(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        }); 
    }

    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};