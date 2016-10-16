<?php

use Illuminate\Database\Seeder;
use App\Subtema;
use App\Modulo;


class ModuloSubtemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulo_subtema')->insert([
            'modulo_id' => Modulo::all()->random()->id,
            'subtema_id' => Subtema::all()->random()->id,
        ]);
    }
}
