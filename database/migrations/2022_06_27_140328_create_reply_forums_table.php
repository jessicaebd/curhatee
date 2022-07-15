<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_forums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('forum_id')->references('id')->on('forums')->constrained();
            $table->foreignUuid('user_id')->nullable()->references('id')->on('users')->constrained();
            $table->foreignUuid('psychologist_id')->nullable()->references('id')->on('psychologists')->constrained();
            $table->text('content');
            $table->string('image')->nullable();
            $table->integer('like')->default(0);
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
        Schema::dropIfExists('reply_forums');
    }
}
