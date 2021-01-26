<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreRecoderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_recoder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('mac');
            $table->string('seat_num');
            $table->integer('bet')->default('0');
            $table->integer('credits')->default('0');
            $table->string('status')->default('hanging');
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
        Schema::dropIfExists('score_calculator');
    }
}
