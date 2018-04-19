<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->integer('PersonId')->unsigned();
            $table->string('Name');
            $table->string('LastName');
            $table->float('Height',8,2);
            $table->float('Weight',8,2);
            $table->date('Age');
            $table->enum('Gender',['Male','Female']);
            $table->enum('Destination',['LoseWeight','GainWeight']);
            $table->enum('FitWaist',['Yes','No']);
            $table->enum('ShowBMI',['Yes','No']);
            $table->enum('Pattern',['Mifflin','Harris']);
            $table->timestamps();
        });
        Schema::table('persons', function (Blueprint $table) {       
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
        Schema::dropIfExists('persons');
    }
}
