<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userId');
            $table->text('postTitle');
            $table->text('postDescription');
            $table->integer('upvote')->nullable();
            $table->timestamps();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete(('cascade'));
        });
        /*Schema::create('posts', function (Blueprint $table) {
            $table->timestamp('created_at');
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('posts');
    }
}
