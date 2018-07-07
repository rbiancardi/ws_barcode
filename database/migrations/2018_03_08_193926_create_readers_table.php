<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('readers', function (Blueprint $table) {
			$table->increments('id');
			$table->string('reader_name')->unique();
			$table->string('merchant_id');
			$table->string('location_name');
			$table->string('branch_id');
			$table->string('reader_ip');
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
		Schema::dropIfExists('readers');
	}
}
