<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned();
            $table->integer('rounds_id')->unsigned();
            $table->foreign('events_id')
                ->references('id')
                ->on('events_tbl');
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
        Schema::drop('events_rounds');
    }
}
