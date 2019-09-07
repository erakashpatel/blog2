<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
      return [
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'user_id' => '1',
        'duration' => $faker->randomElement($array = array ('1','2','3','6','12'), $count = 1) , // password
        'difficulty' => $faker->randomElement($array = array ('Beginner','Intermediate','Advanced'), $count = 1) ,
    ];
});
