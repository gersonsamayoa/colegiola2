<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table ('users')->insert([
          'name'  =>'Gerson Samayoa',
          'email' =>'gersonsamayoa@cts.edu.gt',
          'password'  =>bcrypt('sysadmon'),
          'type'      =>'admin',
      ]);
    }
}
