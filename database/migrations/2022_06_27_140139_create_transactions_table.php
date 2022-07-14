<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users')->constrained();
            $table->foreignUuid('psychologist_id')->references('id')->on('psychologists')->constrained();
            $table->foreignUuid('consultation_type_id')->references('id')->on('consultation_types')->constrained();
            $table->foreignUuid('schedule_id')->references('id')->on('schedules')->constrained()->nullable();
            $table->foreignUuid('payment_type_id')->references('id')->on('payment_types')->constrained();
            $table->integer('price');
            $table->string('detail');
            $table->string('status');
            $table->dateTime('time');
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
        Schema::dropIfExists('transactions');
    }
}
