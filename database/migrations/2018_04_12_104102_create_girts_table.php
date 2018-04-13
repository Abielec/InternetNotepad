<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGirtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girts', function (Blueprint $table) {
            $table->integer('PersonId')->unsigned();
            $table->float('Calf',8,2); //Łydka
            $table->float('Pas',8,2); // Pas
            $table->float('Waist',8,2); //Talia
            $table->float('Chest',8,2); // Klatka piersiowa
            $table->float('Hips',8,2); //Biodra
            $table->float('Thigh',8,2); //Udo
            $table->float('Arm',8,2); //Ramię
            $table->timestamps();
        });
        Schema::table('girts', function (Blueprint $table) {       
            $table->foreign('PersonId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('girts');
    }
}
