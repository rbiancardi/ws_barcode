<?php

use Illuminate\Database\Seeder;

class BranchSectorProducTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\BranchSectorProduct::class, 16)->create();
	}
}
