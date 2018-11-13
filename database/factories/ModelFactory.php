<?php

use Faker\Generator as Faker;

use App\Category;
use App\User;
use App\Client;
use App\Dish;
use App\Gallery;
use App\Image;
use App\Occassion;
use App\Payment;
use App\Reservation;
use App\Table;
use App\Tag;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

User::flushEventListeners();
Client::flushEventListeners();
Category::flushEventListeners();
Dish::flushEventListeners();
Gallery::flushEventListeners();
Image::flushEventListeners();
Occasion::flushEventListeners();
Payment::flushEventListeners();
Reservation::flushEventListeners();
Table::flushEventListeners();
Tag::flushEventListeners();

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->firstName . " " . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'verified' => $verificado = User::USUARIO_VERIFICADO,
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Client::class, function (Faker $faker){
  return [
    'name' => $faker->firstName . " " . $faker->lastName,
    'phone' => $faker->e164PhoneNumber,
    'email' => $faker->unique()->safeEmail,
  ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->word,
    	'description' => $faker->paragraph(3),
      'icon' => str_random(15),
    ];
});

$factory->define(Table::class, function(Faker $faker){
  return [
    'number' => $faker->randomLetter . "-" . $faker->randomDigit,
    'price' => $faker->numberBetween($min = 300, $max = 1000),
    'status' => Tabel::MESA_DISPONIBLE,
    'size' => $faker->numberBetween($min = 2, $max = 8),
  ];
});

$factory->define(Image::class, function(Faker $faker){
  return [
    'name' => $faker->word,
    'uri' => str_random(25) . "." . $faker->randomElement(['jpg','png','svg','jpeg']);
  ];
});

$factory->define(Occasion::class, function(Faker $faker){
  return [
    'name' => $faker->text($maxNbChars = 200),
  ];
});
