<?php

use Faker\Generator as Faker;

$factory->define(App\UserType::class, function (Faker $faker) {

	$date = $faker->dateTimeThisMonth;
	$userType_name = array('API_USER_PRIMER_BIT', 'BO_USER_PRIMER_BIT', 'API_USER_MERCHANT', 'BO_USER_MERCHANT');

	return [

		'name' => $faker->randomElement($userType_name),
		'description' => $faker->word = 'USER_TYPE_DESCRIPTION',
		'enable' => $faker->word = '1',
		'created_at' => $faker->date,
		'updated_at' => $faker->date,

	];

});
