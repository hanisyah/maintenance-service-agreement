<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
         \App\User::insert([
      [
        'username'  => 'Admin',
        'password' => bcrypt('password'),
        'email' => 'Admin@gmail.com',
        'level'  => 'Administrator',
        'name'  => 'Admin',
        'keterangan' => '[751901001] ANDIK AGUS PRASETYO ([SLO] Solo - Depo Solo)',
        'status' => 'Aktif',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
         ],
      ]);
   }
}
