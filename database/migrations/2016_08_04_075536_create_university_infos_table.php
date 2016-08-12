<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('university_id');
            $table->integer('established');
            $table->integer('rank')->nullable();
            $table->integer('population');
            $table->integer('intpopulation');
            $table->integer('pkpopulation');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('extracur');
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
        Schema::drop('university_info');
    }
}
