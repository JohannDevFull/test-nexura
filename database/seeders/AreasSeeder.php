<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $areas='[
            {
                "name":"Administrativa y Financiera"
            },
            {
                "name":"Ingeniería"
            },
            {
                "name":"Desarrollo de Negocio"
            },
            {
                "name":"Proyectos"
            },
            {
                "name":"Servicios"
            },
            {
                "name":"Calidad"
            }
        ]';

        $array_areas=json_decode($areas);

        foreach ($array_areas as $key ) 
        {
            // code...
            DB::table('areas')->insert([
                'name'          =>  $key->name
            ]);
        }
    }
}
