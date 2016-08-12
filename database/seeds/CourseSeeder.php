<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new \App\Course();
        $field = App\Field::find(1);
        $level = App\Level::find(2);
        $course->level()->associate($level);
        $course->field()->associate($field);
        $course->course_name = 'BS Chemical Engineering';
        $course->careers = 'Chemist,Consultant,Entreprenuer';
        $course->accred = 'Uni of so, and uni of say';

        $university = \App\University::find(1);
        $course->university()->associate($university);
        $course->save();
    }
}
