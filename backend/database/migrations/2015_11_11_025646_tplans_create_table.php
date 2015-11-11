<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TplansCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('photography');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->boolean('status');
        });

        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('area_origin_id')->unsigned();
            $table->integer('area_destination_id')->unsigned();

            $table->foreign('area_origin_id')->references('id')->on('areas');
            $table->foreign('area_destination_id')->references('id')->on('areas');

            $table->decimal('price_normal', 10, 2);
            $table->decimal('price_reverse', 10, 2);
            $table->boolean('status');
        });


        Schema::create('phone_calls', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rates_id')->unsigned();
            $table->integer('plans_id')->unsigned();

            $table->foreign('rates_id')->references('id')->on('rates');
            $table->foreign('plans_id')->references('id')->on('plans');

            $table->char('flag_cursor');

            $table->integer('time');
            $table->decimal('rate_min_with', 10, 2);
            $table->decimal('rate_min_without', 10, 2);
            $table->boolean('status');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
