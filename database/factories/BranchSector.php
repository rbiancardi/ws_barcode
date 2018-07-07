<?php

use Faker\Generator as Faker;

$factory->define(App\BranchSector::class, function (Faker $faker) {

	$date = $faker->dateTimeThisMonth;

	$sectorName = array('FIAMBRERIA', 'ROTISERIA',
		'PRODUCTOS_REGIONALES', 'CARNICERIA',
		'VERDULERIA', 'VINOTECA',
		'PANADERIA', 'ALMACEN',
		'LIMPIEZA_PERFUMERIA', 'AUTOMOTOR',
		'DEPORTES', 'INDUMENTARIA',
		'LINEA_DE_CAJAS', 'ELECTRO',
		'JUGUETERIA', 'HOGAR');

	$sector_desc = array('FAKE_SECTOR_DESCRIPTION_1', 'FAKE_SECTOR_DESCRIPTION_2', 'FAKE_SECTOR_DESCRIPTION_3', 'FAKE_SECTOR_DESCRIPTION_4', 'FAKE_SECTOR_DESCRIPTION_5');

	$branch_id = App\BranchOffice::all()->pluck('branch_id');

	return [

		'sector_name' => $faker->randomElement($sectorName),
		'sector_description' => $faker->randomElement($sector_desc),
		'branch_name' => $faker->randomElement($branch_id->toArray()),
		'enable' => $faker->word = '1',
		'created_at' => $date,
		'updated_at' => $date,

	];
});
