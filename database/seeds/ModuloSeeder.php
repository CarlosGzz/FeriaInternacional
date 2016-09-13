<?php

use Illuminate\Database\Seeder;
use App\Modulo;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Modulo::class, 10)->create();
    }
}
