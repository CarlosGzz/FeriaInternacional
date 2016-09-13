<?php

use Illuminate\Database\Seeder;

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
            'evento_id' => rand(1,10),
            'subtema_id' => rand(1,10),
        ]);
    }
}
