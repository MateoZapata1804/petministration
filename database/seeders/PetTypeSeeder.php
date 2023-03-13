<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_mascota')->insert(['nombre_tm' => 'Perro']);
        DB::table('tipos_mascota')->insert(['nombre_tm' => 'Gato']);
        DB::table('tipos_mascota')->insert(['nombre_tm' => 'Conejo']);
        DB::table('tipos_mascota')->insert(['nombre_tm' => 'Caballo']);
    }
}
