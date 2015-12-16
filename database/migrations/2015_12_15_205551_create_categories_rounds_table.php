<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id')->unsigned();
            $table->integer('rounds_id')->unsigned();
            $table->integer('events_id')->unsigned();
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories_2016_tbl');
            $table->foreign('rounds_id')
                ->references('id')
                ->on('rounds');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories_rounds');
    }
}
