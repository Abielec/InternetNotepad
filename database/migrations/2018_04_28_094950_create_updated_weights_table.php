<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatedWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updated_weights', function (Blueprint $table) {
            $table->increments('UpdateId');
            $table->integer('PersonId')->unsigned();
            $table->float('Weight',8,2)->unsigned();
            $table->date('Data');
            $table->timestamps();
        });
        Schema::table('updated_weights',function (Blueprint $table)
        {
            $table->foreign('PersonId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updated_weights');
    }
}
