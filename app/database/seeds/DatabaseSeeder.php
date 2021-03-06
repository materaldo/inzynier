<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('TypesGravesTableSeeder');
		
		$this->command->info('Types of graves table seeded!');
		
		$this->call('PlacesTableSeeder');
		
		$this->command->info('Places table seeded!');
		
		$this->call('GravesSeeder');
		
		$this->command->info('Graves seeded!');
		
		$this->call('BuriedSeeder');
		
		$this->command->info('Buried seeded!');
		
		$this->call('UserSeeder');
		
		$this->command->info('User seeded!');
	}

}
