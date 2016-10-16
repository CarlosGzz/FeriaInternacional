<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        $this->call(UsersSeeder::class);

        // Edicion
        $this->call(EdicionSeeder::class);

        // Tema
        $this->call(TemaSeeder::class);

        // Temas en Edicion
        $this->call(EdicionTemaSeeder::class);

        // Subtema
        $this->call(SubtemaSeeder::class);

        // Eventos
        $this->call(EventoSeeder::class);

        // Subtemas de Eventos
        $this->call(EventoSubtemaSeeder::class);

        // Modulos
        $this->call(ModuloSeeder::class);

        // Subtemas de Modulos
        $this->call(ModuloSubtemaSeeder::class);

        // Formatos
        $this->call(FormatoSeeder::class);
        
        // Contenido
        $this->call(ContenidoSeeder::class);
    }
}
