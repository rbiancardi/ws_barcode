<?php

use App\BranchOffice;
use App\Reader;
use Faker\Generator as Faker;

$factory->define(App\Reader::class, function (Faker $faker) {

	$reader_name = array('PRIMER_BIT_READER', 'PRIMER_BIT_READER_1', 'PRIMER_BIT_READER_2', 'PRIMER_BIT_READER_4', 'PRIMER_BIT_READER_4', 'PRIMER_BIT_READER_5', 'TEST_READER_1', 'TEST_READER_2', 'TEST_READER_3', 'TEST_READER_4',
		'TEST_READER_5', 'TEST_READER_6', 'TEST_READER_7', 'TEST_READER_8');

	//$reader_name = array('PRIMER_BIT_READER_3');
	$date = $faker->dateTimeThisMonth;
	$merchant_id = App\Merchant::all()->pluck('merchant_id');
	$branchs = App\BranchOffice::all()->pluck('branch_id');
	$sectors = App\BranchSector::all()->pluck('sector_name');

	return [

		'reader_name' => $faker->randomElement($reader_name),
		'merchant_id' => $faker->randomElement($merchant_id->toArray()),
		'sector_name' => $faker->randomElement($sectors->toArray()),
		'branch_id' => $faker->randomElement($branchs->toArray()),
		'reader_ip' => $faker->word = '127.0.0.1',
		'enable' => $faker->word = '1',
		'created_at' => $date,
		'updated_at' => $date,

		/*
			      'reader_name' => $faker->word = $reader_name = array('reader1' => 'TEST_READER_1', 'reader2' => 'TEST_READER_2', 'reader3' => 'TEST_READER_3', 'reader4' => 'TEST_READER_4'),
			      'merchant_id' => $faker->word = $reader = array('merchant' => 'primerbit'),
			      'location_id' => $faker->word = $location_id = array('location1' => 'TEST_LOCATION_1', 'location2' => 'TEST_LOCATION_2', 'location3' => 'TEST_LOCATION_3', 'location4' => 'TEST_LOCATION_4'),
			      'branch_id' => $faker->word = $branch_id = array('branch1' => 'TEST_BRANCH_ID_1', 'branch2' => 'TEST_BRANCH_ID_2', 'branch3' => 'TEST_BRANCH_ID_3', 'branch4' => 'TEST_BRANCH_ID_4'),
			      'reader_ip' =>  $faker->word = $ip = array('ip_reader' => '127.0.0.1'),
			      'created_at' => $faker->dateTimeThisMonth,
		*/

	];
});
