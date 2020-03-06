<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('topping_id');
            $table->unsignedBigInteger('crust_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('topping_id')
                  ->references('id')->on('toppings')
                  ->onDelete('cascade');
            $table->foreign('crust_id')
                  ->references('id')->on('crusts')
                  ->onDelete('cascade');
            $table->foreign('size_id')
                  ->references('id')->on('sizes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
