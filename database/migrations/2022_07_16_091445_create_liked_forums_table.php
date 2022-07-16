<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liked_forums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('forum_id')->nullable()->references('id')->on('forums')->constrained();
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
        Schema::dropIfExists('liked_forums');
    }
}
