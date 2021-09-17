<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'nomadmin'=> $faker->name,
        'prenomadmin'=> $faker->name,
        'poste'=> $faker->word,     
        'tel'=> $faker->phoneNumber  ,       
        'emailadmin' =>  $faker->unique()->safeEmail,
        'passadmin' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ,
        'created_at'=>now()

    ];
});
