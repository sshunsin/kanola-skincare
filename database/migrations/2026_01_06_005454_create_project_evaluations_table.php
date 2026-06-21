<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('project_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('product_batch_number')->nullable();
            $table->integer('score');
            $table->enum('risk_level', ['low', 'medium', 'high']);
            $table->enum('quality', ['poor', 'fair', 'good', 'excellent']);
            $table->enum('decision', ['continue', 'revision', 'hold', 'terminated']);
            $table->text('manager_notes')->nullable();
            $table->text('employee_notes')->nullable();
            $table->date('evaluation_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_evaluations');
    }
}