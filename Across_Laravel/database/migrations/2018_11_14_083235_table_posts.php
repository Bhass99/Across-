<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePosts extends Migration
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
            $table->integer('post_parent_id')->unsigned()->nullable();
            $table->foreign('post_parent_id')->references('id')->on('categories');
            $table->string('title')->default(null);
            $table->longText('description');
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->string('first_li')->nullable();
            $table->string('second_li')->nullable();
            $table->string('posted_by')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
