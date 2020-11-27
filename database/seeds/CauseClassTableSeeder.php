<?php

use Illuminate\Database\Seeder;

class CauseClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\cause_class::insert([
            [
                'Cause_Class_Name'    => 'Fitting komponen',
                'created_at'          => \Carbon\Carbon::now(),
                'updated_at'          => \Carbon\Carbon::now()
            ],
            [
                'Cause_Class_Name'    => 'Human Error',
                'created_at'          => \Carbon\Carbon::now(),
                'updated_at'          => \Carbon\Carbon::now()
              ]
        ]);
    }
}
