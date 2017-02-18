<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->bigInteger('score_one')->default(0);
            $table->bigInteger('score_two')->default(0);
            $table->bigInteger('score_three')->default(0);
            $table->bigInteger('score_four')->default(0);
            $table->bigInteger('score_five')->default(0);
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
        Schema::drop('score');
    }
}
