<?php

use App\BranchOffice;
use Faker\Generator as Faker;

/**
 *
 */

$factory->define(BranchOffice::class, function (Faker $faker) {

	$date = $faker->dateTimeThisMonth;

	$branchName = array('SUCURSAL_1', 'SUCURSAL_2',
		'SUCURSAL_3', 'SUCURSAL_4',
		'SUCURSAL_5', 'SUCURSAL_6',
		'SUCURSAL_7', 'SUCURSAL_8',
		'SUCURSAL_9', 'SUCURSAL_10',
		'SUCURSAL_11', 'SUCURSAL_12',
		'SUCURSAL_13', 'TSUCURSAL_14');

	$branchId = array('ID_SUCURSAL_1', 'ID_SUCURSAL_2',
		'ID_SUCURSAL_3', 'ID_SUCURSAL_4',
		'ID_SUCURSAL_5', 'ID_SUCURSAL_6',
		'ID_SUCURSAL_7', 'ID_SUCURSAL_8',
		'ID_SUCURSAL_9', 'ID_SUCURSAL_10',
		'ID_SUCURSAL_11', 'ID_SUCURSAL_12',
		'ID_SUCURSAL_13', 'ID_SUCURSAL_14');

	$branch_location = array('Ciudad Autonoma de Bs As',
		'Buenos Aires', 'Catamarca', 'Chaco', 'Chubut',
		'Córdoba', 'Corrientes', 'Entre Ríos', 'Formosa',
		'Jujuy', 'La Pampa', 'La Rioja', 'Mendoza', 'Misiones',
		'Neuquén', 'Río Negro', 'Salta', 'San Juan', 'Santa Cruz',
		'Santa Fe', 'Santiago del Estero', 'Tierra del Fuego',
		'Tucumán');

	$merchant_id = App\Merchant::all()->pluck('merchant_id');

	$country_code = array(
		'ALA', 'AFG', 'ALB', 'DZA', 'ASM', 'AND', 'AGO', 'AIA', 'ATA', 'ATG', 'ARG', 'ARM', 'ABW', 'AUS',
		'AUT', 'AZE', 'BHS', 'BHR', 'BGD', 'BRB', 'BLR', 'BEL', 'BLZ', 'BEN', 'BMU', 'BTN', 'BOL', 'BIH',
		'BWA', 'BVT', 'BRA', 'IOT', 'BRN', 'BGR', 'BFA', 'BDI', 'KHM', 'CMR', 'CAN', 'CPV', 'CYM', 'CAF',
		'TCD', 'CHL', 'CHN', 'CXR', 'CCK', 'COL', 'COM', 'COD', 'COG', 'COK', 'CRI', 'CIV', 'HRV', 'CUB',
		'CYP', 'CZE', 'DNK', 'DJI', 'DMA', 'DOM', 'ECU', 'EGY', 'SLV', 'GNQ', 'ERI', 'EST', 'ETH', 'FLK',
		'FRO', 'FJI', 'FIN', 'FRA', 'GUF', 'PYF', 'ATF', 'GAB', 'GMB', 'GEO', 'DEU', 'GHA', 'GIB', 'GRC',
		'GRL', 'GRD', 'GLP', 'GUM', 'GTM', 'GIN', 'GNB', 'GUY', 'HTI', 'HMD', 'HND', 'HKG', 'HUN', 'ISL',
		'IND', 'IDN', 'IRN', 'IRQ', 'IRL', 'ISR', 'ITA', 'JAM', 'JPN', 'JOR', 'KAZ', 'KEN', 'KIR', 'PRK',
		'KOR', 'KWT', 'KGZ', 'LAO', 'LVA', 'LBN', 'LSO', 'LBR', 'LBY', 'LIE', 'LTU', 'LUX', 'MAC', 'MKD',
		'MDG', 'MWI', 'MYS', 'MDV', 'MLI', 'MLT', 'MHL', 'MTQ', 'MRT', 'MUS', 'MYT', 'MEX', 'FSM', 'MDA',
		'MCO', 'MNG', 'MSR', 'MAR', 'MOZ', 'MMR', 'NAM', 'NRU', 'NPL', 'NLD', 'ANT', 'NCL', 'NZL', 'NIC',
		'NER', 'NGA', 'NIU', 'NFK', 'MNP', 'NOR', 'OMN', 'PAK', 'PLW', 'PSE', 'PAN', 'PNG', 'PRY', 'PER',
		'PHL', 'PCN', 'POL', 'PRT', 'PRI', 'QAT', 'REU', 'ROU', 'RUS', 'RWA', 'SHN', 'KNA', 'LCA', 'SPM',
		'VCT', 'WSM', 'SMR', 'STP', 'SAU', 'SEN', 'SCG', 'SYC', 'SLE', 'SGP', 'SVK', 'SVN', 'SLB', 'SOM',
		'ZAF', 'SGS', 'ESP', 'LKA', 'SDN', 'SUR', 'SJM', 'SWZ', 'SWE', 'CHE', 'SYR', 'TWN', 'TJK', 'TZA',
		'THA', 'TLS', 'TGO', 'TKL', 'TON', 'TTO', 'TUN', 'TUR', 'TKM', 'TCA', 'TUV', 'UGA', 'UKR', 'ARE',
		'GBR', 'USA', 'UMI', 'URY', 'UZB', 'VUT', 'VAT', 'VEN', 'VNM', 'VGB', 'VIR', 'WLF', 'ESH', 'YEM',
		'ZMB', 'ZWE',

	);

	return [

		'branch_id' => $faker->randomElement($branchId),
		'branch_name' => $faker->randomElement($branchName),
		'merchant_id' => $faker->randomElement($merchant_id->toArray()),
		//'branch_country' => $faker->word = 'ARG',
		'branch_country' => $faker->randomElement($country_code),
		'branch_location' => $faker->word = 'OTHER_LOCATION',
		//'branch_location' => $faker->randomElement($branch_location),
		'enable' => $faker->word = '1',
		'created_at' => $date,
		'updated_at' => $date,

/*
$factory->define(App\BranchOffice::class, function (Faker $faker) {

$date = $faker->dateTimeThisMonth;
$branch = array('TEST_BRANCH_ID_1','TEST_BRANCH_ID_2','TEST_BRANCH_ID_3','TEST_BRANCH_ID_4','TEST_BRANCH_ID_5','TEST_BRANCH_ID_6');
$branch_name = array('TEST_BRANCH_1', 'TEST_BRANCH_2', 'TEST_BRANCH_3', 'TEST_BRANCH_4', 'TEST_BRANCH_5', 'TEST_BRANCH_6');

return [

'branch_id' => $faker->words($branch),
'branch_name' => $faker->words($branch_name),
'merchant_id' => $faker->word = 'primerbit',
'branch_country' => $faker->word = 'ARG',
'branch_location'=> $faker->word ='BS_AS',
'created_at' => $date,
'updated_at' => $date */

		/*
			      'branch_id' => $faker->word = $branch_id = array('branch1' => 'TEST_BRANCH_ID_1', 'branch2' => 'TEST_BRANCH_ID_2', 'branch3' => 'TEST_BRANCH_ID_3', 'branch4' => 'TEST_BRANCH_ID_4', 'branch5' => 'TEST_BRANCH_ID_5', 'branch6' => 'TEST_BRANCH_ID_6'),
			      'branch_name' => $faker->word = $branch_id = array('branch1' => 'TEST_BRANCH_1', 'branch2' => 'TEST_BRANCH_2', 'branch3' => 'TEST_BRANCH_3', 'branch4' => 'TEST_BRANCH_4', 'branch5' => 'TEST_BRANCH_5', 'branch6' => 'TEST_BRANCH_6'),
			      'merchant_id' => $faker->word = $reader = array('merchant' => 'primerbit'),
			      'branch_country' => $faker->word = $country = array('merchant' => 'ARG'),
			      'branch_location'=> $faker->word = $branch_location = array('branch1' => 'BS_AS', 'branch2' => 'SAN_JUAN', 'branch3' => 'CORDOBA', 'branch4' => 'MENDOZA', 'branch5' => 'SANTA_FE'),
			      'created_at' => $faker->dateTimeThisMonth,
			      'updated_at' => $faker->dateTimeThisMonth
		*/

	];
});
