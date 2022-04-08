<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('torneos_locales')->insert([
            [
               'torneo_id' => 1,
               'nombre' => 'Campeonato de Primera División 1981',
               'pais' => 'Argentina',
               'description'  => 'El Campeonato de Primera División 1981, llamado extraoficialmente Torneo Metropolitano 1981, fue el sexagésimo séptimo de la era profesional y el que abrió la temporada de la Primera División de Argentina. Se desarrolló desde el 22 de febrero al 15 de agosto, en dos ruedas de todos contra todos.',
               'year' =>  date('1981-02-22'),
               'img' => 'metro-1981.jpg',
               'alt' => 'Maradona Campeón del torneo Metropolitano 1981 con Boca Juniors',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 2,
               'nombre' => 'Copa del Rey',
               'pais' => 'España',
               'description'  => 'La Copa del Rey de Fútbol 1981-82 fue la edición número 78 de dicha competición española. Se disputó entre el 2 de septiembre de 1981 y el 13 de abril de 1982, y contó con la participación de 136 equipos de las divisiones Primera, Segunda, Segunda B y Tercera. El campeón fue el Real Madrid C. F., tras vencer al Real Sporting de Gijón por 2-1 en la final celebrada en el estadio José Zorrilla de Valladolid.',
               'year' =>  date('1981-09-02'),
               'img' => 'barcelona-1982.jpg',
               'alt' => 'Maradona y Mario Kempes 1982 España',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 3,
               'nombre' => 'Copa de la Liga de España',
               'pais' => 'España',
               'description'  => 'La Copa de la Liga de 1983 fue la primera edición disputada de este torneo en España en la categoría de Primera División. Se disputó entre el 8 de mayo y el 29 de junio de 1983 bajo la modalidad de eliminación directa a ida y vuelta. Participaron los dieciocho equipos que durante aquel año compitieron en Primera División.',
               'year' =>  date('1983-05-28'),
               'img' => 'barcelona-1983.jpg',
               'alt' => 'Maradona Campeón de la copa de la Liga de España',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 4,
               'nombre' => 'Supercopa de España de Fútbol',
               'pais' => 'España',
               'description'  => 'La Supercopa de España de 1983 se disputó entre el campeón de Liga 1982/83, el Athletic Club, y el campeón de la Copa del Rey de 1982-83, el F. C. Barcelona.
Se jugó en partidos de ida y vuelta, el 26 de octubre en Bilbao y el 30 de noviembre en Barcelona.',
               'year' =>  date('1983-10-26'),
               'img' => 'barcelona-super-1983.jpg',
               'alt' => 'Maradona Campeón de la Supercopa de España',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 5,
               'nombre' => 'Serie A',
               'pais' => 'Italia',
               'description'  => 'La Serie A 1986–87 fue la 85ª edición del campeonato de fútbol de más alto nivel en Italia y la 55ª bajo el formato de grupo único. Napoli ganó su primer scudetto.',
               'year' =>  date('1986-07-26'),
               'img' => 'scudetto-1986.jpg',
               'alt' => 'Maradona Campeón de la Serie A de Italia 1986 a 1987',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 6,
               'nombre' => 'Copa Italia',
               'pais' => 'Italia',
               'description'  => 'La Copa Italia 1986-87 fue la trigésimo novena edición del torneo. El Napoli salió campeón tras ganarle al Atalanta.',
               'year' =>  date('1987-07-21'),
               'img' => 'copa-italia-1987.jpg',
               'alt' => 'Maradona Campeón de la Copa Italia 1987',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 7,
               'nombre' => 'Copa de la UEFA',
               'pais' => 'Internacional',
               'description'  => 'La Copa de la UEFA 1988-89 se disputó entre septiembre de 1988 y mayo de 1989, con la participación total de 64 equipos distintos, representantes de 31 federaciones nacionales afiliadas a la UEFA.',
               'year' =>  date('1988-09-04'),
               'img' => 'uefa-1988.jpg',
               'alt' => 'Maradona Campeón de la Copa de la UEFA',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 8,
               'nombre' => 'Serie A',
               'pais' => 'Italia',
               'description'  => 'La Serie A 1989–90 fue la 88.ª edición del campeonato de fútbol de más alto nivel en Italia y la 58.ª bajo el formato de grupo único. Napoli ganó su segundo scudetto.',
               'year' =>  date('1989-09-04'),
               'img' => 'scudetto-1989.jpg',
               'alt' => 'Maradona Campeón de la Serie A de Italia 1989',
               'created_at' => now(),
               'updated_at' => now(),
           ],
            [
               'torneo_id' => 9,
               'nombre' => 'Supercopa de Italia',
               'pais' => 'Italia',
               'description'  => 'La Supercopa de Italia 1990 fue la tercera edición de la Supercopa de Italia, que enfrentó a los ganadores de la Serie A y la Copa de Italia. El partido se disputó el 1 de septiembre de 1990, en el Stadio San Paolo de Nápoles. Los equipos que disputaron esta edición fueron el SSC Napoli (campeón de la Serie A) y la Juventus FC (campeón de la Copa de Italia). El Napoli ganó el título después de un contundente 5-1.',
               'year' =>  date('1990-09-01'),
               'img' => 'supercopa-1990.jpg',
               'alt' => 'Maradona Campeón de la Supercopa de Italia 1990',
               'created_at' => now(),
               'updated_at' => now(),
           ],
        ]);
    }
}
