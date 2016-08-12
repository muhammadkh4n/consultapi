<?php

use App\University;
use App\UniversityInfo;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $university = new University();
        $university->name = "University of Curtin";
        $university->address = "123 Double Street";
        $university->city = "Miri";
        $university->country = "Malaysia";
        $university->email = "info@curtin.edu.my";
        $university->website = "http://www.curtin.edu.my";
        $university->save();

        $university_info = new UniversityInfo();
        $university_info->established = 1980;
        $university_info->rank = 300;
        $university_info->latitude = 44.231;
        $university_info->longitude = 76.324;
        $university_info->population = 10234;
        $university_info->intpopulation = 4000;
        $university_info->pkpopulation = 300;
        $university_info->extracur = "It has cricket. football and etc.";

        $university->info()->save($university_info);
    }
}
