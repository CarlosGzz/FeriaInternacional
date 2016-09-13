<?php

use Illuminate\Database\Seeder;
use App\Evento;


class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Evento::class, 10)->create();
    }
}
