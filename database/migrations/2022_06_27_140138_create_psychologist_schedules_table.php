<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychologistSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychologist_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('psychologist_id')->references('id')->on('psychologists')->constrained();
            $table->string('day');
            $table->dateTime('dateBook')->nullable();
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->string('detail');
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
        Schema::dropIfExists('psychologist_schedules');
    }
}
