<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->string('reader_name');
			$table->string('barcode');
			$table->string('product_description');
			$table->string('product_currency');
			$table->string('product_price');
			$table->string('merchant_id');
			$table->string('transaction_type');
			$table->string('trx_result');
			$table->string('branch_name');
			$table->string('location_name');
			$table->string('reader_ip');
			$table->string('trx_ip');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('transactions');
	}
}
