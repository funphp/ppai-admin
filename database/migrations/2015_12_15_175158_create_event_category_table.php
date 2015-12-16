<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->foreign('events_id')
                ->references('id')
                ->on('events_tbl');
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories_2016_tbl');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories_events');
    }
}
