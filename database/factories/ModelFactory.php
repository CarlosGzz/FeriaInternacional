<?php
use App\User;
use App\Administrador;
use App\Edicion;
use App\Tema;
use App\Evento;
use App\Subtema;
use App\Modulo;
use App\Formato;
use App\Contenido;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
// FACTORY for seeding User
$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'tipo' => $faker->randomElement($array = array ('organizador','administrador','editor')),
        'remember_token' => str_random(10),
    ];
});

// FACTORY for seeding Edicion
$factory->define(Edicion::class, function (Faker\Generator $faker) {
    return [
        'pais' => $faker->name,
        'fechaInicio' => $faker->dateTimeThisMonth($max = 'now'),
        'fechaFinal' => $faker->dateTimeThisMonth($max = 'now'),
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'estatus' => 'planeado',
        'modo' => false,
        'user_id' => User::all()->random()->id,
    ];
});

// FACTORY for seeding Evento
$factory->define(Evento::class, function (Faker\Generator $faker) {
    return [
        'edicion_id' => Edicion::all()->random()->id,
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'fechaInicio' => $faker->dateTimeThisMonth($max = 'now'),
        'fechaFinal' => $faker->dateTimeThisMonth($max = 'now'),
        'lugar' => $faker->address,
        'descripcion' => $faker->text($maxNbChars = 50),
        'tema_id' => Tema::all()->random()->id,
        'tipo' => $faker->text($maxNbChars = 50),
        'encargado' => $faker->name,
        'estatus' => rand(1,2),
        'registroDeAsistencia' => $faker->text($maxNbChars = 50),
        'audienciaInteresada' => $faker->text($maxNbChars = 50),
        'comentarios' => $faker->text($maxNbChars = 400),   
        'user_id' => User::all()->random()->id,
    ];
});

// FACTORY for seeding Modulo
$factory->define(Modulo::class, function (Faker\Generator $faker) {
    return [
        'edicion_id' => Edicion::all()->random()->id,
        'titulo' => $faker->word,
        'user_id' => User::all()->random()->id,
        'tema_id' => Tema::all()->random()->id,
        'tipo' => $faker->word,
        'estatus' => rand(1,2),  
    ];
});

// FACTORY for seeding Tema
$factory->define(Tema::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,
    ];
});

// FACTORY for seeding Subtema
$factory->define(Subtema::class, function (Faker\Generator $faker) {
    return [
    	'tema_id' => Tema::all()->random()->id,
        'nombre' => $faker->word,
    ];
});

// FACTORY for seeding Contenido
$factory->define(Contenido::class, function (Faker\Generator $faker) {
    return [
    	'modulo_id' => Modulo::all()->random()->id,
        'formato_id' => Formato::all()->random()->id,
        'contenido' => $faker->imageUrl($width = 640, $height = 480),
        'secuencia' => $faker->date,
    ];
});

// FACTORY for seeding Formato
$factory->define(Formato::class, function (Faker\Generator $faker) {
    return [
        'formato' => $faker->word,
    ];
});