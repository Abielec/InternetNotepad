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
            $table->float('Calf',8,2)->unsigned(); //Łydka
            $table->float('Pas',8,2)->unsigned(); // Pas
            $table->float('Waist',8,2)->unsigned(); //Talia
            $table->float('Chest',8,2)->unsigned(); // Klatka piersiowa
            $table->float('Hips',8,2)->unsigned(); //Biodra
            $table->float('Thigh',8,2)->unsigned(); //Udo
            $table->float('Arm',8,2)->unsigned(); //Ramię
            $table->timestamps();
        });
        Schema::table('girts', function (Blueprint $table) {       
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
        Schema::dropIfExists('girts');
    }
}
