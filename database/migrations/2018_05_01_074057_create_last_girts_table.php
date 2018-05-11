<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLastGirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_girts', function (Blueprint $table) {
            $table->increments('UpdateId');
            $table->integer('user')->unsigned();
            $table->float('Calf',8,2)->unsigned()->nullable(); //Łydka
            $table->float('Pas',8,2)->unsigned()->nullable(); // Pas
            $table->float('Waist',8,2)->unsigned()->nullable(); //Talia
            $table->float('Chest',8,2)->unsigned()->nullable(); // Klatka piersiowa
            $table->float('Hips',8,2)->unsigned()->nullable(); //Biodra
            $table->float('Thigh',8,2)->unsigned()->nullable(); //Udo
            $table->float('Arm',8,2)->unsigned()->nullable(); //Ramię
            $table->enum('Month',['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień']);
            $table->timestamps();
        });
        Schema::table('last_girts', function(Blueprint $table)
        {
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_girts');
    }
}
