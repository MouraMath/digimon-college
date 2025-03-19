<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DigimonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('digimons')->insert([
            [
                'nome' => 'Wargreymon',
                'level' => 'Mega',
                'atributo' => 'Vaccine', 
                'tipo' => 'Dragão',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Angewomon',
                'level' => 'Ultimate',
                'atributo' => 'Vaccine',
                'tipo' => 'Humanoide',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Devimon',
                'level' => 'Champion', 
                'atributo' => 'Virus',
                'tipo' => 'Humanoide',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Agumon',
                'level' => 'Rookie',
                'atributo' => 'Vaccine',
                'tipo' => 'Reptil',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Gabumon',
                'level' => 'Rookie',
                'atributo' => 'Data',
                'tipo' => 'Mamífero',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Gatomon',
                'level' => 'Champion',
                'atributo' => 'Vaccine', 
                'tipo' => 'Mamífero',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Greymon',
                'level' => 'Champion',
                'atributo' => 'Vaccine',
                'tipo' => 'Outros',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Garurumon',
                'level' => 'Champion',
                'atributo' => 'Data',
                'tipo' => 'Mamífero',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Birdramon', 
                'level' => 'Champion',
                'atributo' => 'Vaccine',
                'tipo' => 'Ave',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Ogremon',
                'level' => 'Champion',
                'atributo' => 'Virus',
                'tipo' => 'Humanoide',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
