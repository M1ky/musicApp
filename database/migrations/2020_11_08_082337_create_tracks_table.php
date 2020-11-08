<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('isrc');
            $table->foreignId('composer_id')->references('id')->on('authors');
            $table->foreignId('author_id')->references('id')->on('authors');
            $table->foreignId('author_coverage_id')->references('id')->on('authors');
            $table->bigInteger('time_seconds');
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
        Schema::dropIfExists('tracks');
    }
}
