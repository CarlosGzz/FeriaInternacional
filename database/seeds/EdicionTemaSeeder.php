<?php

use Illuminate\Database\Seeder;

class EdicionTemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edicion_tema')->insert([
            'edicion_id' => rand(1,10),
            'tema_id' => rand(1,10),
        ]);
    }
}
