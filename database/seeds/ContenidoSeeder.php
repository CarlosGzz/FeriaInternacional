<?php

use Illuminate\Database\Seeder;
use App\Contenido;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contenido::class, 20)->create();
    }
}
