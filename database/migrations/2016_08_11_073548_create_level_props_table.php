<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_props', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id');
            $table->integer('university_id');
            $table->unique(array('level_id', 'university_id'));
            $table->integer('level_tuition')->nullable();
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
        Schema::drop('level_props');
    }
}
