<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('PostId');
            $table->integer('WritedBy')->unsigned();
            $table->char('Title',60);
            $table->longtext('content');
            $table->longtext('Image');
            $table->timestamps();
        });
        Schema::table('blog_posts',function(Blueprint $table)
        {
            $table->foreign('WritedBy')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
