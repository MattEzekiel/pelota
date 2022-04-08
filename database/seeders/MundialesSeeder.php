<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MundialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mundiales')->insert([
            [
                'mundial_id' => 1,
                'nombre' => 'Mundial España',
                'description'  => 'Tenía todo para ganar, pero terminó en fracaso. La selección dirigida por César Luis Menotti finalizó en el 11° puesto. Pasó la primera fase (derrota ante Bélgica y triunfos ante Hungría y El Salvador), pero fue eliminada en la segunda tras perder con Italia (el campeón) y Brasil.',
                'year' =>  date('1982-6-13'),
                'img' => 'espana-1982.jpg',
                'alt' => 'Mundial España 1982',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mundial_id' => 2,
                'nombre' => 'Mundial Mexico',
                'description'  => 'De la mano de "D10s". La Selección Argentina ganó el Mundial de 1986, el segundo en su historia, gracias al superlativo nivel de Diego Maradona en tierras mexicanas. La albiceleste tan solo había sido campeón en 1978 jugando como local, pero su generación dorada hizo historia ocho años después.',
                'year' =>  date('1986-5-31'),
                'img' => 'mexico-1986.jpg',
                'alt' => 'Mundial Mexico 1986',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            'mundial_id' => 3,
            'nombre' => 'Mundial Italia',
            'description'  => 'La Albiceleste venía de ser campeona en México 86 de la mano de Bilardo y en Italia estuvo a punto de repetir la hazaña. El conjunto dirigido por el "Narigón" debutó en el Mundial del 90 el 8 de junio con una derrota ante Camerún. Pasó a octavos de final como el mejor tercero de la fase grupal y eliminó a Brasil, Yugoslavia y a la anfitriona, Italia, antes de llegar a la final. Cuando parecía que podía lograr el doblete, Alemania Federal acabó con el sueño argentino al imponerse en la final con un gol de Brehme de penalti en los últimos instantes del partido.',
            'year' =>  date('1990-6-8'),
            'img' => 'italia-1990.jpg',
            'alt' => 'Mundial Italia 1990',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'mundial_id' => 4,
                'nombre' => 'Mundial Estados Unidos',
                'description'  => '"Me cortaron la piernas", fue la frase del astro, en una improvisada conferencia de prensa, tres días después de conocerse su adiós al Mundial.',
                'year' =>  date('1994-6-17'),
                'img' => 'eeuu-1994.jpg',
                'alt' => 'Mundial Estados Unidos 1994',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mundial_id' => 5,
                'nombre' => 'Mundial Sudáfrica',
                'description'  => 'El campeonato jugado en Sudáfrica fue el XIX Mundial y el primero en realizarse en el continente africano. También fue la primera vez en que se jugó con la pelota `Jabulani`, un balón del que los arqueros se quejaron por considerarlo "resbaloso y liviano".',
                'year' =>  date('2014-6-12'),
                'img' => 'sudafrica-2010.jpg',
                'alt' => 'Mundial Sudáfrica 2010',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
