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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

use App\CategorieEvenement;
use App\CategorieArticle;
use App\User;

$factory->define(App\Evenement::class, function (Faker\Generator $faker) {

	$faker->locale('fr_FR');

	$categorieEvenementRandom = CategorieEvenement::orderBy(DB::raw('RAND()'))->first();

    $imagesEvent = [
        '/images/office.jpg',
        '/images/party.jpg',
        '/images/pong.jpg',
        '/images/whisky.jpg',
    ];

    return [
		'association_id' => 0, // redefinis Dans EvenementsTableSeederSeeder
		'categorie_id' => $categorieEvenementRandom->id,
		'titre' => $faker->text(30),
		'lieu' => $faker->streetName.", 33000 Bordeaux",
		'dateDeb' => $faker->dateTime(),
		'dateFin' => $faker->dateTime(),
		'prix' => $faker->numberBetween(0,70),
		'tarifs' => '3$ La pinte, 4$ Mojito et le pastaga 2$',
		'description' => $faker->text(400),
        //'affiche' => $faker->imageUrl($width = 640, $height = 480),
		'affiche' => $imagesEvent[$faker->numberBetween(0,3)],
		'nbMaxParticipants'=> $faker->numberBetween(0,50) ,
    ];
});


$factory->define(App\Article::class, function (Faker\Generator $faker) {

	$faker->locale('fr_FR');

    $categorieArticleRandom = CategorieArticle::orderBy(DB::raw('RAND()'))->first();

    return [
        'association_id' => 0,// redefini Dans ArticlesTableSeeder,
        'categorie_id' => $categorieArticleRandom->id,
        'titre' => $faker->word,
        'texte' => $faker->paragraphs($nb = 4, $asText = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'created_at' => $faker->dateTime,
    ];
});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {

	$faker->locale('fr_FR');

    $userRandom = User::orderBy(DB::raw('RAND()'))->first();

    return [
        'user_id' => $userRandom->id,
        'texte' => $faker->text($faker->numberBetween(20,200)),
        // 'texte' => $faker->paragraphs($nb = 4, $asText = true),
    ];
});

$factory->define(App\Membre::class, function (Faker\Generator $faker) {

    $faker->locale('fr_FR');

    return [
        'association_id' => 0,// redefini Dans ArticlesTableSeeder,
        'nom' => $faker->lastName,
        'prenom' => $faker->firstName,
        'surnom' => $faker->userName,
        'poste' => $faker->jobTitle,
        'email' => $faker->email,
        'description' => $faker->paragraphs($nb = 1, $asText = true),
        'photo' => $faker->imageUrl($width = 500, $height = 500, 'people'),
        'created_at' => $faker->dateTime,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {

    $faker->locale('fr_FR');

    return [
        'name' => $faker->lastName.' '.$faker->firstName,
        'email' => $faker->email,
        'google_id' => $faker->numberBetween(2,12070),
        'avatar' => '/images/default-avatar.png',
    ];

});