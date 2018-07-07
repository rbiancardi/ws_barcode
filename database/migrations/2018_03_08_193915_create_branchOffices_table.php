<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchOfficesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('branchOffices', function (Blueprint $table) {
			$table->increments('id');
			$table->string('branch_id')->unique();
			$table->string('branch_name')->unique();
			$table->string('merchant_id');
			$table->string('branch_country');
			$table->string('branch_location');
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
		Schema::dropIfExists('branchOffices');
	}
}
