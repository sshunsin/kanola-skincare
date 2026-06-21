<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('parent')->nullable();
            $table->string('level')->nullable();
            $table->string('main_function')->nullable();
            $table->string('scope')->nullable();
            $table->string('status')->nullable();
            $table->string('manager')->nullable();
            $table->integer('staff')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->string('target_kpi')->nullable();
            $table->string('achievement')->nullable();
            $table->string('risk')->nullable();
            $table->string('system_role')->nullable();
            $table->string('access_rights')->nullable();
            $table->string('shift')->nullable();
            $table->string('operational_hour')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};