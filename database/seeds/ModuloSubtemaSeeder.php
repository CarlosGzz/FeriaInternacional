<?php

use Illuminate\Database\Seeder;

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
            'modulo_id' => rand(1,10),
            'subtema_id' => rand(1,10),
        ]);
    }
}
