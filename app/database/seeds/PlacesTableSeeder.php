<?php

class PlacesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	
		DB::table('places')->delete();
		DB::unprepared("ALTER TABLE places AUTO_INCREMENT = 1;");
		//Sektor A
		Place::create(['sector'=>'A','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'4','number'=>'6','id_cem'=>'1']);
		//Sektor B
		Place::create(['sector'=>'B','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'4','number'=>'6','id_cem'=>'1']);
		//Sektor C
		Place::create(['sector'=>'C','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'4','number'=>'6','id_cem'=>'1']);
		//Sektor D
		Place::create(['sector'=>'D','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'4','number'=>'6','id_cem'=>'1']);
		//Sektor E
		Place::create(['sector'=>'E','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'4','number'=>'6','id_cem'=>'1']);
		//Sektor F
		Place::create(['sector'=>'F','row'=>'1','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'1','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'1','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'1','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'1','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'1','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'2','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'3','number'=>'6','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'1','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'2','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'3','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'4','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'5','id_cem'=>'1']);
		Place::create(['sector'=>'F','row'=>'4','number'=>'6','id_cem'=>'1']);
		
		
		
		
		// $this->call('UserTableSeeder');
		
	}

}
