<?php

use Illuminate\Database\Seeder;

class BranchSectorTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\BranchSector::class, 16)->create();
	}
}
