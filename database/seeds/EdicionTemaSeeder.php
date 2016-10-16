<?php

use Illuminate\Database\Seeder;
use App\Edicion;
use App\Tema;

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
            'edicion_id' => Edicion::all()->random()->id,
            'tema_id' => Tema::all()->random()->id,
        ]);
    }
}
