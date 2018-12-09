<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_singer')->unsigned();
            $table->integer('id_genre')->unsigned();
            $table->integer('year_issue');
            $table->integer('year_publishing');
            $table->integer('id_country')->unsigned();
            $table->integer('id_state')->unsigned();
            $table->decimal('price');
            $table->integer('bonus');
            $table->string('track_list');
            $table->timestamps();

            /* $table->foreign('id_singer')->references('id')->on('singer')->onDelete('cascade');
             $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');
             $table->foreign('id_country')->references('id')->on('countries')->onDelete('cascade');
             $table->foreign('id_state')->references('id')->on('state')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
