<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedReplyForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liked_reply_forums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('reply_forum_id')->nullable()->references('id')->on('reply_forums')->constrained();
            $table->foreignUuid('user_id')->nullable()->references('id')->on('users')->constrained();
            $table->foreignUuid('psychologist_id')->nullable()->references('id')->on('psychologists')->constrained();
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
        Schema::dropIfExists('like_reply_forums');
    }
}
