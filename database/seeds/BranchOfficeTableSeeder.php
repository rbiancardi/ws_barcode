<?php

use Illuminate\Database\Seeder;

class BranchOfficeTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\BranchOffice::class, 14)->create();
	}
}
