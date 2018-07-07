<?php

use App\BranchOffice;
use App\Reader;
use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

	$date = $faker->dateTimeThisMonth;
	$readers = App\Reader::all()->pluck('reader_name');
	$branchs = App\BranchOffice::all()->pluck('branch_id');
	$sectors = App\BranchSector::all()->pluck('sector_name');
	$barcode = App\Product::all()->pluck('barcode');
	$prod_desc = App\Product::all()->pluck('description');
	$prod_currency = App\Currency::all()->pluck('iso_4712');
	$prod_price = App\Product::all()->pluck('price');
	$merchant_id = App\Merchant::all()->pluck('merchant_id');
	$trx_result = array('OK', 'NOK');
	$consulta = App\TrxType::all()->pluck('type_name');
	$date = $faker->dateTimeThisMonth;

	return [

		'reader_name' => $faker->randomElement($readers->toArray()),
		'barcode' => $faker->randomElement($barcode->toArray()),
		'product_description' => $faker->randomElement($prod_desc->toArray()),
		'product_currency' => $faker->randomElement($prod_currency->toArray()),
		'product_price' => $faker->randomElement($prod_price->toArray()),
		'merchant_id' => $faker->randomElement($merchant_id->toArray()),
		'transaction_type' => $faker->randomElement($consulta->toArray()),
		'trx_result' => $faker->randomElement($trx_result),
		'branch_name' => $faker->randomElement($branchs->toArray()),
		'sector_name' => $faker->randomElement($sectors->toArray()),
		'reader_ip' => $faker->word = '127.0.0.1',
		'trx_ip' => $faker->ipv4,
		'created_at' => $date,
		'updated_at' => $date,

	];
});
