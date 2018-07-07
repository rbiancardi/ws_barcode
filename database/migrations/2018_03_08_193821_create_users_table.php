<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('role_id');
			$table->string('user_name')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('name');
			$table->string('last_name');
			$table->string('merchant_id');
			$table->string('user_type_id');
			$table->string('role_name');
			$table->integer('enable');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users_types');
	}
}
