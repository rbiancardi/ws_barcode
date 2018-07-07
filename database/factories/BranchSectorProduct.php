<?php

use Faker\Generator as Faker;

$factory->define(App\BranchSectorProduct::class, function (Faker $faker) {

	$sector_id = App\BranchSector::all()->pluck('id');
	$branch_sector_id = App\Product::all()->pluck('branch_sector_id');
	$date = $faker->dateTimeThisMonth;

	return [

		'sector_id' => $faker->randomElement($sector_id->toArray()),
		'branch_sector_id' => $faker->randomElement($branch_sector_id->toArray()),
		'created_at' => $faker->date,
		'updated_at' => $faker->date,

	];
});
