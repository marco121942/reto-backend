<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Group::create(
            [
                "name" => 'Desarrollo web Front-end',
                "description" => 'Bienvenido ,en este grupo encontrarás más sobre el desarrollo Front-end',
            ]
        );
        Group::create(
            [
                "name" => 'Desarrollo web Back-end',
                "description" => 'Bienvenido ,en este grupo encontrarás más sobre el desarrollo Back-end',
            ]
        );
        Group::create(
            [
                "name" => 'Desarrollo Móvil',
                "description" => 'Bienvenido ,en este grupo encontrarás más sobre el desarrollo móvil',

            ]
        );
    }
}
