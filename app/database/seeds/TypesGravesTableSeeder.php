<?php

class TypesGravesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('typesOfGraves')->delete();
		DB::table('cemeteries')->delete();
		DB::unprepared("ALTER TABLE cemeteries AUTO_INCREMENT = 1;");
		DB::unprepared("ALTER TABLE typesOfGraves AUTO_INCREMENT = 1;");
		
		Cemetery::create(['name'=>'Cmentarz komunalny','street'=>'Piotrkowska','building'=>'56','post_code'=>'10-100','city'=>'Pacanów']);
		
		TypeGraves::create(['type'=>'grób ziemny jednoosobowy']);
		TypeGraves::create(['type'=>'grób urnowy ziemny rodzinny']);
		TypeGraves::create(['type'=>'grób murowany']);
		TypeGraves::create(['type'=>'grób ziemny dziecięcy']);
		TypeGraves::create(['type'=>'grób urnowy ziemny pojedynczy']);
		TypeGraves::create(['type'=>'rezerwacja']);
		TypeGraves::create(['type'=>'grób głębinowy']);
		TypeGraves::create(['type'=>'grobowiec jednoosobowy']);
		TypeGraves::create(['type'=>'grobowiec dwuosobowy']);
		TypeGraves::create(['type'=>'grób ziemny dwuosobowy']);

		// $this->call('UserTableSeeder');
	}

}
