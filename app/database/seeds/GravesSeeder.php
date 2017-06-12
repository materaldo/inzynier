<?php

class GravesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	
		Grave::create(['id_place'=>'1','id_type'=>'1']);
		Grave::create(['id_place'=>'2','id_type'=>'2']);
		Grave::create(['id_place'=>'3','id_type'=>'3']);
		Grave::create(['id_place'=>'4','id_type'=>'4']);
		Grave::create(['id_place'=>'5','id_type'=>'1']);
		Grave::create(['id_place'=>'6','id_type'=>'2']);
		Grave::create(['id_place'=>'11','id_type'=>'3']);
		Grave::create(['id_place'=>'12','id_type'=>'4']);
		Grave::create(['id_place'=>'13','id_type'=>'5']);
		Grave::create(['id_place'=>'14','id_type'=>'6']);
		Grave::create(['id_place'=>'15','id_type'=>'8']);
		Grave::create(['id_place'=>'16','id_type'=>'8']);
		Grave::create(['id_place'=>'17','id_type'=>'8']);
		Grave::create(['id_place'=>'18','id_type'=>'8']);
		Grave::create(['id_place'=>'19','id_type'=>'10']);
		Grave::create(['id_place'=>'20','id_type'=>'9']);
		Grave::create(['id_place'=>'21','id_type'=>'7']);
		Grave::create(['id_place'=>'22','id_type'=>'6']);
		Grave::create(['id_place'=>'23','id_type'=>'6']);
		Grave::create(['id_place'=>'24','id_type'=>'6','id_dis'=>'1']);
		Grave::create(['id_place'=>'25','id_type'=>'2','id_dis'=>'2']);
		Grave::create(['id_place'=>'26','id_type'=>'2','id_dis'=>'3']);
		Grave::create(['id_place'=>'27','id_type'=>'2','id_dis'=>'4']);
		Grave::create(['id_place'=>'30','id_type'=>'3','id_dis'=>'5']);
		Grave::create(['id_place'=>'31','id_type'=>'3','id_dis'=>'6']);
		Grave::create(['id_place'=>'32','id_type'=>'4','id_dis'=>'7']);
		Grave::create(['id_place'=>'33','id_type'=>'4','id_dis'=>'8']);
		Grave::create(['id_place'=>'34','id_type'=>'5','id_dis'=>'9']);
		Grave::create(['id_place'=>'35','id_type'=>'6','id_dis'=>'10']);
		Grave::create(['id_place'=>'36','id_type'=>'1','id_dis'=>'11']);
		Grave::create(['id_place'=>'40','id_type'=>'3','id_dis'=>'12']);
		Grave::create(['id_place'=>'41','id_type'=>'1','id_dis'=>'13']);
		Grave::create(['id_place'=>'42','id_type'=>'1','id_dis'=>'14']);
		Grave::create(['id_place'=>'43','id_type'=>'3','id_dis'=>'15']);
		Grave::create(['id_place'=>'44','id_type'=>'4','id_dis'=>'16']);
		Grave::create(['id_place'=>'45','id_type'=>'4','id_dis'=>'17']);
		Grave::create(['id_place'=>'46','id_type'=>'5','id_dis'=>'18']);
		Grave::create(['id_place'=>'47','id_type'=>'7','id_dis'=>'19']);
		
	}

}
