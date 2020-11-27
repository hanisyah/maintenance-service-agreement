<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        \App\measurement::insert([
            [
              'Measurement_Commercial'  => 'M-2',
              'Measurement_Technical'	=> '1/M2',
              'Measurement_Name_1'		=> '1/M2',
              'Measurement_Name_2'		=> '1 / square meter',
              'created_at'              => \Carbon\Carbon::now(),
              'updated_at'              => \Carbon\Carbon::now()
            ]
        ]);
    }
}
