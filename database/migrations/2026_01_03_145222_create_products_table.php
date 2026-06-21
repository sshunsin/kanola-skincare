<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('batch_number');
            $table->date('manufactured_at');
            $table->date('expired_at');
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['active', 'discontinued']);
            $table->text('benefits')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('how_to_use')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('categories_id');         
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};