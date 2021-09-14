<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demande;
use App\User;
use Faker\Generator as Faker;

$factory->define(Demande::class, function (Faker $faker) {
    return [
        'date_debut'=> $faker->dateTime,
        'date_fin'=> $faker->dateTime,
        'nb_jours'=> $faker->randomDigit,     
        'Raison'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),       
        'etat' => $faker->word ,
        'user_id' => User::get('id')->random(),
        'created_at'=>now()
    ];
});
