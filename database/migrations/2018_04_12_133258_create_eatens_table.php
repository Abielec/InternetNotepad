<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eatens', function (Blueprint $table) {
            $table->integer('EatedBy')->unsigned();
            $table->integer('EatedProduct')->unsigned();
            $table->float('EatedWeight')->unsigned();
            $table->time('EatedAbout');
            $table->date('EatedDate');
            $table->timestamps();
        });
        Schema::table('eatens', function (Blueprint $table) {       
            $table->foreign('EatedBy')->references('id')->on('users');
            $table->foreign('EatedProduct')->references('id')->on('make_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eatens');
    }
}
