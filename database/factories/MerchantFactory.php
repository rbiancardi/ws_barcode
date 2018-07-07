<?php

use Faker\Generator as Faker;

$factory->define(App\Merchant::class, function (Faker $faker) {

	$merchant_id = array('PRIMER_BIT', 'MERCHANT_1', 'MERCHANT_2', 'MERCHANT_3', 'MERCHANT_4', 'MERCHANT_5');
	$merchant_name = array('PRIMER_BIT', 'MERCHANT_NAME');
	$merchant_address = array('PRIMER_BIT', 'FAKE_MERCHANT_ADDRESS_1', 'FAKE_MERCHANT_ADDRESS_2', 'FAKE_MERCHANT_ADDRESS_3', 'FAKE_MERCHANT_ADDRESS_4', 'FAKE_MERCHANT_ADDRESS_5');

	$merchant_admin = array('PRIMER_BIT', 'FAKE_MERCHANT_ADMIN_1', 'FAKE_MERCHANT_ADMIN_2', 'FAKE_MERCHANT_ADMIN_3', 'FAKE_MERCHANT_ADMIN_4', 'FAKE_MERCHANT_ADMIN_5');

	$merchant_contact = array('PRIMER_BIT', 'FAKE_MERCHANT_CONTACT_1', 'FAKE_MERCHANT_CONTACT_2', 'FAKE_MERCHANT_CONTACT_3', 'FAKE_MERCHANT_CONTACT_4', 'FAKE_MERCHANT_CONTACT_5');

	$merchant_desc = array('PRIMER_BIT', 'FAKE_MERCHANT_DESCRIPTION_1', 'FAKE_MERCHANT_DESCRIPTION_2', 'FAKE_MERCHANT_DESCRIPTION_3', 'FAKE_MERCHANT_DESCRIPTION_4', 'FAKE_MERCHANT_DESCRIPTION_5');

	$date = $faker->dateTimeThisMonth;
	//$role_name = App\Role::all()->pluck('role_name');

	return [

		'merchant_id' => $faker->randomElement($merchant_id),
		'merchant_name' => $faker->randomElement($merchant_name),
		'secret_key' => $faker->sha1(),
		'merchant_address' => $faker->randomElement($merchant_address),
		'merchant_phone' => $faker->phoneNumber(),
		'merchant_admin' => $faker->randomElement($merchant_admin),
		'merchant_contact' => $faker->randomElement($merchant_admin),
		'merchant_mail' => $faker->word = 'test@primerbit.com',
		'merchant_description' => $faker->randomElement($merchant_desc),
		'enable' => $faker->word = '1',
		'created_at' => $faker->date,
		'updated_at' => $faker->date,

	];

});
