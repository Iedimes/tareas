<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Task::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'date_begin' => $faker->date(),
        'date_end' => $faker->date(),
        'obs' => $faker->sentence,
        'state_id' => $faker->randomNumber(5),
        'advance' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DetailTask::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'task_id' => $faker->randomNumber(5),
        'state_id' => $faker->randomNumber(5),
        'date_begin' => $faker->date(),
        'date_end' => $faker->date(),
        'obs' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'advance' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
