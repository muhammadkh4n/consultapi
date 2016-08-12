<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field = new \App\Field();
        $field->field_name = 'Engineering';
        $field->save();

        $field = new \App\Field();
        $field->field_name = 'Social Sciences';
        $field->save();

        $field = new \App\Field();
        $field->field_name = 'Medical';
        $field->save();
    }
}
