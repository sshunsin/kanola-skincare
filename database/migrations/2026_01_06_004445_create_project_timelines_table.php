<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_timelines', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->index();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', [
                'planning',
                'on_progress',
                'completed',
                'delayed'
            ])->default('planning');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_timelines');
    }
};