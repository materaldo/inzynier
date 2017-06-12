<?php

class PlacesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	
		//DB::table('places')->delete();
		//DB::unprepared("ALTER TABLE places AUTO_INCREMENT = 1;");
		
		Place::create(['sector'=>'A','row'=>'1','number'=>'1','x'=>'100','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'2','x'=>'230','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'4','x'=>'0','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'1','number'=>'5','x'=>'0','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'A','row'=>'2','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'1','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'B','row'=>'2','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'1','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'C','row'=>'2','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'1','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'D','row'=>'2','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'1','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'1','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'2','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'3','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>true,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'4','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'5','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		Place::create(['sector'=>'E','row'=>'2','number'=>'6','x'=>'360','y'=>'100','width'=>'120','length'=>'200','status'=>false,'id_cem'=>'1']);
		
		Dispatcher::create(['first_name'=>'Jan','last_name'=>'Kowalski','phone_number'=>'781781111']);
		Dispatcher::create(['first_name'=>'Michał','last_name'=>'Białek','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Justyna','last_name'=>'Głowacka','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Mateusz','last_name'=>'Czarodziej','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Kamila','last_name'=>'Wach','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Weronika','last_name'=>'Furmańczyk','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Robert','last_name'=>'Rabenda','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Jan','last_name'=>'Pędziwiatr','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Łukasz','last_name'=>'Wolski','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Klaudia','last_name'=>'Bach','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Ferdynand','last_name'=>'Zawadzki','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Jakub','last_name'=>'Matuszewski','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Krystian','last_name'=>'Kowalczyk','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Oliwia','last_name'=>'Chłodna','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Kamil','last_name'=>'Zimny','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Hubert','last_name'=>'Urbański','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Michał','last_name'=>'Cieśla','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Iwona','last_name'=>'Szalona','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Andrzej','last_name'=>'Gołota','phone_number'=>'781123456']);
		Dispatcher::create(['first_name'=>'Euzebiusz','last_name'=>'Fryc','phone_number'=>'781123456']);
		
		// $this->call('UserTableSeeder');
		
	}

}
