<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Company::insert([
            [
              'comShortname'    => 'PT IMSS	',
              'comName'	        => 'PT Inka Multi Solusi Service',
              'comAddress'		=> 'Jl. Salak No.59, Taman, Kec. Taman, Kota Madiun, Jawa Timur 63131',
              'comPhone'		=> '(0351) 454094',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
