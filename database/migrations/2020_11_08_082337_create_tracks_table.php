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

        \Illuminate\Support\Facades\DB::table('tracks')->insert(
            array(
                'id' => 1,
                'title' => 'Track 1',
                'isrc' => 'ISRC',
                'composer_id' => 1,
                'author_id' => 1,
                'author_coverage_id' => 1,
                'time_seconds' => 60
            ),
            array(
                'id' => 2,
                'title' => 'Track 2',
                'isrc' => 'ISRC',
                'composer_id' => 2,
                'author_id' => 1,
                'author_coverage_id' => 2,
                'time_seconds' => 120
            ),
            array(
                'id' => 3,
                'title' => 'Track 3',
                'isrc' => 'ISRC',
                'composer_id' => 1,
                'author_id' => 2,
                'author_coverage_id' => 1,
                'time_seconds' => 180
            )
        );
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
