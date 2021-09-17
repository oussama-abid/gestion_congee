<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employe;
use Faker\Generator as Faker;

$factory->define(Employe::class, function (Faker $faker) {
    return [
        'nomemploye'=> $faker->name,
        'prenomemploye'=> $faker->name,
        'poste'=> $faker->word,     
        'tel'=> $faker->phoneNumber  ,       
        'emailemploye' =>  $faker->unique()->safeEmail,
        'passemploye' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ,
        'created_at'=>now()
    ];
});
