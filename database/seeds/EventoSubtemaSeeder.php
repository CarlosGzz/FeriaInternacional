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
            'evento_id' => factory(Evento::class)->create()->id,
            'subtema_id' => factory(Subtema::class)->create()->id,
        ]);
    }
}
