<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = new \App\Level();
        $level->level_name = 'Foundation';
        $level->save();

        $level = new \App\Level();
        $level->level_name = 'Bachelors';
        $level->save();

        $level = new \App\Level();
        $level->level_name = 'Masters';
        $level->save();
    }
}
