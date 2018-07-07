<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		//$this->call(RoleTableSeeder::class);
		//$this->call(PermissionTableSeeder::class);
		//$this->call(MerchantTableSeeder::class);
		//$this->call(UserTypeTableSeeder::class);
		//$this->call(BranchOfficeTableSeeder::class);
		//$this->call(BranchSectorTableSeeder::class);
		//$this->call(ProductTableSeeder::class);
		//$this->call(ReaderTableSeeder::class);
		//$this->call(TransactionTableSeeder::class);
		$this->call(BranchSectorProducTableSeeder::class);

	}
}
