<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->references('id')->on('users')->constrained();
            $table->foreignUuid('psychologist_id')->nullable()->references('id')->on('psychologists')->constrained();
            $table->foreignUuid('transaction_id')->references('id')->on('transactions')->constrained();
            $table->string('message')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('sent_at');
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
        Schema::dropIfExists('chats');
    }
}
