<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordenes')->insert([
            [
              'orden_id' => 1,
              'carrito' =>   'Pelota: Tango España,
                                Cantidad de Pelotas: 1,',
               'nombre' => 'usuario',
                'email' => 'usuario@usuario.com',
                'direction' => 'Chacabuco 1578',
                'tel' => 116724485406,
                'total' => 150000,
                'usuario_id' => 2,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
              'orden_id' => 2,
              'carrito' =>   'Pelota: Azteca,
                                Cantidad de Pelotas: 1,
                                 Pelota: Tango España,
                                  Cantidad de Pelotas: 1',
               'nombre' => 'marcelo',
                'email' => 'marcelino@jajaja.com',
                'direction' => 'asfasfas 127461',
                'tel' => null,
                'total' => 400000,
                'usuario_id' => 3,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
              'orden_id' => 3,
              'carrito' =>   'Pelota: Etrusco Unico,
                                Cantidad de Pelotas: 2,
                                Pelota: Azteca,
                                Cantidad de Pelotas: 1,',
               'nombre' => 'marcelo',
                'email' => 'marcelino@jajaja.com',
                'direction' => 'asfasfas 127461',
                'tel' => null,
                'total' => 610000,
                'usuario_id' => 3,
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
              'orden_id' => 4,
              'carrito' =>   'Pelota: Etrusco Unico,
                                Cantidad de Pelotas: 1',
               'nombre' => 'usuario',
                'email' => 'usuario@usuario.com',
                'direction' => 'Chacabuco 1578',
                'tel' => 116724485406,
                'total' => 180000,
                'usuario_id' => 2,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
              'orden_id' => 5,
              'carrito' =>   'Pelota: Tango España,
                                Cantidad de Pelotas: 2,',
               'nombre' => 'usuario',
                'email' => 'usuario@usuario.com',
                'direction' => 'Chacabuco 1578',
                'tel' => 116724485406,
                'total' => 300000,
                'usuario_id' => 2,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday(),
            ],
            [
              'orden_id' => 6,
              'carrito' =>   'Pelota: Etrusco Unico,
                                Cantidad de Pelotas: 1,
                                Pelota: Azteca,
                                Cantidad de Pelotas: 1,',
               'nombre' => 'usuario',
                'email' => 'usuario@usuario.com',
                'direction' => 'Chacabuco 1578',
                'tel' => 116724485406,
                'total' => 430000,
                'usuario_id' => 2,
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
              'orden_id' => 7,
              'carrito' =>   'Pelota: Tango España,
                                Cantidad de Pelotas: 1,
                                Pelota: Jabulani,
                                Cantidad de Pelotas: 1,',
               'nombre' => 'usuario',
                'email' => 'usuario@usuario.com',
                'direction' => 'Chacabuco 1578',
                'tel' => 116724485406,
                'total' => 320000,
                'usuario_id' => 2,
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
        ]);
    }
}
