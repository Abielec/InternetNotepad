<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProductName')->unique();
            $table->integer('Category')->unsigned();
            $table->float('Calories',8,2);
            $table->float('Carbohydrates',8,2);
            $table->float('Fats',8,2);
            $table->float('Proteins',8,2);
            $table->float('Roughages',8,2);
            $table->char('Vitamins',100);
            $table->longText('Description')->nullable();
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
        Schema::dropIfExists('make_products');
    }
}
