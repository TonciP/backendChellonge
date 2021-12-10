<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::create([
            "smodalidad"=>"Rondas Suizas"
        ]);
        Modalidad::create([
            "smodalidad"=>"Eliminacion Simple"
        ]);
        Modalidad::create([
            "smodalidad"=>"Round Robin"
        ]);
    }
}
