<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelotas')->insert([
            [
                'id' => 1,
                'nombre' => 'Tango España',
                'historia' => 'Se combinó el cuero y el poliuretano, lo que la hizo impermeable.',
                'precio' => 150000,
                'fecha' => date('1982-6-13'),
                'imagen' => 'tango-españa.jpg',
                'mundial_id' => 1,
                'torneo_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Azteca',
                'historia' => 'Primer balón oficial totalmente sintético. Redujo aún más la absorción de agua.',
                'precio' => 250000,
                'fecha' => date('1986-5-31'),
                'imagen' => 'azteca.jpg',
                'mundial_id' => 2,
                'torneo_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre' => 'Etrusco Unico',
                'historia' => 'Fue más veloz por su capa interna de espuma negra de poliuretano. Incluía al león etrusco dentro de los triángulos.',
                'precio' => 180000,
                'imagen' => 'etrusco-unico.jpg',
                'mundial_id' => 3,
                'torneo_id' => null,
                'fecha' => date('1990-6-8'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nombre' => 'Questra',
                'historia' => 'Con su espuma blanca de polietileno compacto por fuera, tenía gran recuperación energética. Tenía además mallas de estabilidad, espuma de polietileno y mallas de fibra trenzadas.',
                'precio' => 130000,
                'imagen' => 'questra.jpg',
                'mundial_id' => 4,
                'torneo_id' => null,
                'fecha' => date('1994-6-17'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nombre' => 'Jabulani',
                'historia' => 'Con una capa de supercarbonato que se supone ayuda a precisar los tiros. Totalmente esférico, muy difícil de parar.',
                'precio' => 170000,
                'fecha' => date('2014-6-12'),
                'imagen' => 'jabulani.jpg',
                'mundial_id' => 5,
                'torneo_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nombre' => 'Adidas Telstar',
                'historia' => 'Adidas Telstar, el mismo balón utilizado para la Copa del Mundo Alemania 1974, fue el protagonista de la Copa América de 1975 donde Perú se consagró campeón luego de disputar la final ante Colombia.',
                'precio' => 300000,
                'imagen' => 'adidas-telstar.jpg',
                'mundial_id' => null,
                'torneo_id' => 1,
                'fecha' => date('1976-9-12'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
