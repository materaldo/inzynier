<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
/*
	public function showWelcome()
	{
		return View::make('hello');
	}*/
	/**
	* Display Home page
	*
	* @return View Home page
	*/
	public function getIndex()
    {	
		return View::make('index');
	}
	
	public function importBuried()
	{
		
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) 
				{
					$insert[] = ['id_grav' => $value->id_grav, 'first_name' => $value->first_name, 'last_name' => $value->last_name, 
								 'family_name' => $value->family_name, 'date_of_birth' => $value->date_of_birth, 
								 'date_of_death' => $value->date_of_death, 'registration_number' => $value->registration_number,
								 'street' => $value->street, 'building' => $value->building,'post_code' => $value->post_code, 
								 'city' => $value->city, 'note' => $value->note, 'image' => $value->image];
				}
				if(!empty($insert)){
					DB::table('buried')->insert($insert);
				}
			}
		}
		$info = 'Pochowani dodani poprawnie';
		return View::make('import')->with('info', $info);
	}
	
	public function importGraves()
	{
		
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) 
				{
					$insert[] = ['id_place' => $value->id_place, 'payment_date' => $value->payment_date, 'width' => $value->width, 
								 'length' => $value->length, 'image' => $value->image, 'id_type' => $value->id_type, 'id_dis' => $value->id_dis];
					$place = Place::find($value->id_place);
					$place->status = true;
					$place->save();
				}
				if(!empty($insert)){
					DB::table('graves')->insert($insert);
				}
			}
		}
		$info = 'Groby dodane poprawnie';
		return View::make('import')->with('info', $info);
	}
	
	public function importDispatchers()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) 
				{
					$insert[] = ['first_name' => $value->first_name, 'last_name' => $value->last_name, 'phone_number' => $value->phone_number, 
								 'street' => $value->street, 'building' => $value->building, 'post_code' => $value->post_code, 'city' => $value->city];
				}
				if(!empty($insert)){
					DB::table('dispatchers')->insert($insert);
				}
			}
		}
		$info = 'Dysponenci dodani poprawnie';
		return View::make('import')->with('info', $info);
	}
	
	public function importPlaces()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) 
				{
					$insert[] = ['sector' => $value->sector, 'row' => $value->row, 'number' => $value->number, 'x' => $value->x, 'y' => $value->y,
								 'width' => $value->width, 'length' => $value->length, 'id_cem' => $value->id_cem];
				}
				if(!empty($insert)){
					DB::table('places')->insert($insert);
				}
			}
		}
		$info = 'Miejsca dodane poprawnie';
		return View::make('import')->with('info', $info);
	}
	
	/**
	* Display add manager page
	*
	* @return View add manager page
	*/
	public function getData()
    {	
		return View::make('data');
	}
	
	public function getImport()
	{
		$info = '';
		return View::make('import')->with('info', $info);
	}
	
	public function getAddGraves()
    {	
		return View::make('graves.graves');
	}
	
	public function getAddDispatchers()
    {	
		return View::make('dispatchers.dispatchers');
	}
	
	public function getAddBuried()
    {	
		return View::make('buried.buried');
	}
	
	public function getMap()
	{
		return View::make('map');
	}
	
	public function getAddPlaces()
	{
		return View::make('places.places');
	}
	
	public function logout()
    {
        Confide::logout();

        return Redirect::to('/users/login');
    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
