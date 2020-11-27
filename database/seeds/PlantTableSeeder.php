<?php

use Illuminate\Database\Seeder;

class PlantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       \App\plant::insert([
        [
          'kode'  			=> 'JKT',
          'nama_plant'		=> 'Jakarta',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ]
    ]);
    }
}
