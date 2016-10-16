<?php

use Illuminate\Database\Seeder;
use App\Evento;
use App\Subtema;

class EventoSubtemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evento_subtema')->insert([
            'evento_id' => Evento::all()->random()->id,
            'subtema_id' => Subtema::all()->random()->id,
        ]);
    }
}
