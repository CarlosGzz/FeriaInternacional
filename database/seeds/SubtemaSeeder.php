<?php

use Illuminate\Database\Seeder;
use App\Subtema;


class SubtemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subtema::class, 10)->create();
    }
}
