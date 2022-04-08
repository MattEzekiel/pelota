<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'usuario_id'=>1,
                'nombre'=>'admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('asd123'),
                'role'=> 'admin',
                'direction' => null,
                'fecha_nacimiento' => null,
                'tel' => null,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'usuario_id'=>2,
                'nombre'=>'usuario',
                'email'=>'usuario@usuario.com',
                'password'=> Hash::make('asd123'),
                'role'=> null,
                'direction' => 'Chacabuco 1578',
                'fecha_nacimiento' => Carbon::parse('1977-09-23'),
                'tel' => 116724485406,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'usuario_id'=>3,
                'nombre'=>'marcelino',
                'email'=>'marcelino@jaja.com',
                'password'=> Hash::make('asd123'),
                'role'=> null,
                'direction' => 'sfasffas 1578',
                'fecha_nacimiento' => Carbon::parse('1993-05-07'),
                'tel' => null,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
