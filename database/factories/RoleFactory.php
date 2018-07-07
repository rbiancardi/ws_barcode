<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {

	$role_name = array('PB_ADMIN', 'PB_USER', 'PB_VIEWER', 'MERCHANT_ADMIN', 'MERCHANT_USER',
		'MERCHANT_VIEWER', 'PB_API_REST', 'MERCHANT_API_REST');

	$date = $faker->dateTimeThisMonth;

	return [

		'role_name' => $faker->randomElement($role_name),
		'role_type' => $faker->randomElement($role_name),
		'role_description' => $faker->word = 'Test Role Description',
		'enable' => $faker->word = '1',
		'created_at' => $date,
		'updated_at' => $date,

	];
});
