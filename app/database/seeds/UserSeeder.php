<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	

		DB::table('users')->delete();
		DB::unprepared("ALTER TABLE users AUTO_INCREMENT = 1;");
		
		$admin = new User;
		$admin->username = 'admin';
        $admin->email = 'cmentarzcmentarz@gmail.com';
        $admin->password = 'admin123';
        $admin->password_confirmation = 'admin123';
        $admin->confirmation_code = md5(uniqid(mt_rand(), true));
        $admin->confirmed = 1;
		$admin->save();
		
		// $this->call('UserTableSeeder');
	}

}
