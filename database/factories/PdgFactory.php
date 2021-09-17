<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pdg;
use Faker\Generator as Faker;

$factory->define(Pdg::class, function (Faker $faker) {
    return [
        'nompdg'=> $faker->name,
        'prenompdg'=> $faker->name,
        'poste'=> $faker->word,     
        'tel'=> $faker->phoneNumber  ,       
        'emailpdg' =>  $faker->unique()->safeEmail,
        'passpdg' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ,
        'created_at'=>now()
    ];
});
