<?php

use Illuminate\Database\Seeder;
use App\Edicion;


class EdicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Edicion::class, 10)->create();
    }
}
