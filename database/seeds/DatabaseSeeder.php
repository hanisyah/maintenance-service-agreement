<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlantTableSeeder::class);
        $this->call(MeasurementTableSeeder::class);
        $this->call(CauseClassTableSeeder::class);
        $this->call(ProblemClassTableSeeder::class);
    }
}
