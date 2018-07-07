<?php

use Faker\Generator as Faker;

$factory->define(App\Permission::class, function (Faker $faker) {

	$permission_name = array('BUSCAR_DATOS', 'CREAR_DATOS', 'ACTUALIZAR_DATOS', 'LEER_DATOS', 'BORRAR_DATOS');
	//$permission_name = array('*');

	$date = $faker->dateTimeThisMonth;
	$role_name = App\Role::all()->pluck('role_name');

	return [

		'role_id' => $faker->randomElement($role_name->toArray()),
		//'role_id' => $faker->word = 'PB_ADMIN',
		'permission_name' => $faker->randomElement($permission_name),
		'permission_description' => $faker->word = 'Test Permission Description',
		'enable' => $faker->word = '1',
		'created_at' => $date,
		'updated_at' => $date,

	];

});
