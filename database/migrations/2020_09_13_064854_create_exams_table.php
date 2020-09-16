<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('admin_id');
            $table->dateTime('exam_date')->nullable();
            $table->time('exam_duration')->nullable();
            $table->integer('total_question')->nullable();
            $table->decimal('qualifying_mark', 8,2)->nullable();
            $table->tinyInteger('status')->description('1=active 0=inactive')->default(1);
            $table->string('exam_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
