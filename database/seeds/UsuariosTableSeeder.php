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

      DB::table ('users')->insert([
          'name'  =>'Manuel Filiberto',
          'email' =>'mfcruzveliz@cts.edu.gt',
          'password'  =>bcrypt('ctsmfcruzveliz'),
          'type'      =>'admin',
      ]);

      DB::table ('users')->insert([
          'name'  =>'Mario Roberto Coronado',
          'email' =>'mrcoronado@cts.edu.gt',
          'password'  =>bcrypt('ctsmrcoronado'),
          'type'      =>'contador',
      ]);

      DB::table ('users')->insert([
          'name'  =>'Baudilio Gilberto Castillo',
          'email' =>'bgcastillo@cts.edu.gt',
          'password'  =>bcrypt('ctsbgcastillo'),
          'type'      =>'secretaria',
      ]);
    }
}
