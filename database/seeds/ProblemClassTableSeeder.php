<?php

use Illuminate\Database\Seeder;

class ProblemClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\problem_class::insert([
            [
                'Problem_Class_Name'  => 'Accessories',
                'created_at'          => \Carbon\Carbon::now(),
                'updated_at'          => \Carbon\Carbon::now()
            ],
            [
                'Problem_Class_Name'  => 'Air Conditioning System',
                'created_at'          => \Carbon\Carbon::now(),
                'updated_at'          => \Carbon\Carbon::now()
              ]
        ]);
    }
}

