<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_one = User::create([
            'name'			=> 'Johan Sebastián Ramírez',
            'email'			=> 'johann.devfull@gmail.com',
            'password'      => bcrypt("johann.123"),
            'sex'           => 'M',
            'boletin'       => true,
            'fk_area_id'    => 2,
            'description'	=> "👋 Hola, soy @JohannDevFull desarrollador fullstack con el stack 'Laravel y Vue'
                💼 He trabajado en Backend ,Frontend , Php, Laravel, Javascipt, Vue, Mysql, Postgresql, Api RestFull, Git, Gitlab, Github, Html, Css, Bootstrap y Metodologia agile scrumm
                👀 Estoy interesado en Backend con Node.js , Frontend React, Base de datos Mongodb  el stack MERN ,Sql , NoSql y Metodologia agile XP
                🌱 Actualmente estoy aprendiendo Vue.js 3, Pinia.js",
        ]);

        $user_one->assignRole('Super Admin');

        $user_two = User::create([
            'name'          => 'User test dev',
            'email'         => 'dev.test@test.com',
            'password'      => bcrypt("admin.123"),
            'sex'           => 'M',
            'boletin'       => true,
            'fk_area_id'    => 1,
            'description'   => "Descripción ejemplo",
        ]);

        $user_two = User::create([
            'name'          => 'Pedro Pérez',
            'email'         => 'pperez@example.co',
            'password'      => bcrypt("admin.123"),
            'sex'           => 'M',
            'boletin'       => true,
            'fk_area_id'    => 5,
            'description'   => "Hola mundo",
        ]);

        $user_two = User::create([
            'name'          => 'Amalia Bayona',
            'email'         => 'abayona@example.co',
            'password'      => bcrypt("admin.123"),
            'sex'           => 'F',
            'boletin'       => false,
            'fk_area_id'    => 6,
            'description'   => "Para contactar a Amalia Bayona, puede escribir al correo electrónico abayona@example.co",
        ]);

    }
}
