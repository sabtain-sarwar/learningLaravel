<?php

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
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index(); // the user will have many different posts
            $table->integer('category_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            // we're gonna use the object(table) here.We're gonna use a method foreign and the foreign key is going to be user_id
            // bcz we're going to relate.We're gonna put the constraint b/w the users table and the post.After that we  are gonna
            // do references the ID.Now you see these 2 constraints(user_id and the id).user_id from the post to the id on the
            // users table.We refrence the id on users.And then we're gonna say is onDelete(we're going to cascade down and 
            // delete everything)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
