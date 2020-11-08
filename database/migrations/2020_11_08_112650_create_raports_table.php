<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('year');
            $table->integer('month');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('reports')->insert(
            array(
                'id' => 1,
                'title' => 'Report 1',
                'year' => 1985,
                'month' => 12,
            ),
            array(
                'id' => 2,
                'title' => 'Report 2',
                'year' => 1986,
                'month' => 1,
            ),
            array(
                'id' => 3,
                'title' => 'Report 3',
                'year' => 1986,
                'month' => 2,
            )
        );

        Schema::create('report_track', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('track_id');
            $table->bigInteger('broadcasts')->nullable();
            $table->timestamps();

            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });

        \Illuminate\Support\Facades\DB::table('report_track')->insert(
            array(
                'id' => 1,
                'report_id' => 1,
                'track_id' => 1,
                'broadcasts' => 50,
            ),
            array(
                'id' => 2,
                'report_id' => 1,
                'track_id' => 2,
                'broadcasts' => 45,
            ),
            array(
                'id' => 3,
                'report_id' => 1,
                'track_id' => 2,
                'broadcasts' => 65,
            ),
        );
    }

    public function down()
    {
        Schema::dropIfExists('report_track');
        Schema::dropIfExists('reports');
    }
}
