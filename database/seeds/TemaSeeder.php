<?php

use Illuminate\Database\Seeder;
use App\Tema;


class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tema::class, 10)->create();
    }
}
