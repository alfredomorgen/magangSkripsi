<?php

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

$factory->defineAs(App\User::class, 'jobseeker', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'role' => \App\Constant::user_jobseeker,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Jobseeker::class, function(Faker\Generator $faker) use ($factory){
    return [
        'gender' => $faker->biasedNumberBetween(0, 1),
        'dob' => $faker->date('Y-m-d', 'now'),
        'gpa' => $faker->randomFloat(2, 1, 4),
        'major' => 'IT',
        'university' => 'Binus University',
    ];
});

$factory->defineAs(App\User::class, 'company', function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'role' => \App\Constant::user_company,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function(Faker\Generator $faker) use ($factory){
    return [
        'address' => $faker->address,
        'website' => $faker->domainName,
        'industry' => 'Technology',
        'size' => $faker->biasedNumberBetween(0, 500),
    ];
});

$factory->define(App\Job::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->biasedNumberBetween(0, 1),
        'salary' => $faker->biasedNumberBetween(0, 1),
        'period' => $faker->biasedNumberBetween(0, 1),
        'benefit' => $faker->sentence,
        'requirement' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});