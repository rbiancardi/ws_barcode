<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('currencies', function (Blueprint $table) {
			$table->increments('id');
			$table->string('iso_4712')->unique();
			$table->string('currency_name')->unique();
			$table->string('currency_country');
			$table->string('enable');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('currencies');
	}
}
