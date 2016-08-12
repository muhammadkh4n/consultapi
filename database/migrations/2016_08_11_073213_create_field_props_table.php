<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_props', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id');
            $table->integer('university_id');
            $table->integer('level_id');
            $table->unique(array('field_id', 'level_id', 'university_id'));
            $table->integer('field_rank')->nullable();
            $table->integer('field_tuition')->nullable();
            $table->text('ent_req');
            $table->integer('duration');
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
        Schema::drop('field_props');
    }
}
