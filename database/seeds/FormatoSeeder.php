<?php

use Illuminate\Database\Seeder;
use App\Formato;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Formato::class, 10)->create();
    }
}
