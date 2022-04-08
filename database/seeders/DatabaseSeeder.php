<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MundialesSeeder::class);
        $this->call(TorneosSeeder::class);
        $this->call(PelotasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(OrdenesSeeder::class);
    }
}
