<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('merchants', function (Blueprint $table) {
			$table->increments('id');
			$table->string('merchant_id')->unique();
			$table->string('user_name');
			$table->string('merchant_name');
			$table->string('secret_key')->unique();
			$table->string('merchant_address');
			$table->string('merchant_phone');
			$table->string('merchant_admin');
			$table->string('merchant_contact');
			$table->string('merchant_mail');
			$table->string('merchant_description');
			$table->integer('enable');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('merchants');
	}
}
