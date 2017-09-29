<?php

use Illuminate\Database\Seeder;
use App\alumno;
use App\carrera;
use Faker\Factory as Faker;

class FakeDataSeeder extends Seeder
{
    public $carreras=array();
    public $limit_alumnos = 5;

    /**
     * Run the database seeds.
     *
     * @return void

     */
    public function run()
    {
        $faker=Faker::create();
        $this->createalumnos($faker);
    }

    public function createalumnos($faker)
    {
      $carreras_list=carrera::all();
      $this->carreras=$carreras_list->lists('nombre', 'id')->toArray();
      for($i=1; $i<=$this->limit_alumnos; $i++){
      alumno::create([
        'nombres'=> $faker->firstname,
        'apellidos'=>$faker->lastname,
        'encargado'=>$faker->name,
        'telefono'=>$faker->tollFreePhoneNumber,
        'codigopersonal'=>$faker->word,
        'carrera_id'=>array_rand($this->carreras)
      ]);
      }
    }
}
