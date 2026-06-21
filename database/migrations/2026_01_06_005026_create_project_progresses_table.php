<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_progress', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('product_batch_number')->nullable();
            $table->string('stage');
            $table->integer('progress_percent');
            $table->enum('status', [
                'not_started',
                'on_progress',
                'completed'
            ])->default('not_started');
            $table->text('description')->nullable();
            $table->date('update_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_progress');
    }
};