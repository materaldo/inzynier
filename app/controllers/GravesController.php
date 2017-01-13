<?php

class GravesController extends BaseController {

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

	/**
	* Display Home page
	*
	* @return View Home page
	*/
	
	public function getIndex()
    {	
		$places = Place::all();
        $placesArr = array();
        foreach($places as $place)
        {
            $placesArr[$place->id] = 'Sektor '.$place->sector.', rząd '.$place->row. ', numer '.$place->number;
		}
		
		$types = TypeGraves::all();
        $typesArr = array();
        foreach($types as $type)
        {
            $typesArr[$type->id] = $type->type;
		}
		$info = 'test';
		
		return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
	}
	
	public function postAdd()
	{
		$places = Place::all();
        $placesArr = array();
        foreach($places as $place)
        {
            $placesArr[$place->id] = 'Sektor '.$place->sector.', rząd '.$place->row. ', numer '.$place->number;
		}
		
		$types = TypeGraves::all();
        $typesArr = array();
        foreach($types as $type)
        {
            $typesArr[$type->id] = $type->type;
		}
		
		$place = DB::table('places')->where('id', Input::get('place_select'))->first();
		$type = DB::table('typesOfGraves')->where('id', Input::get('type_select'))->first();
		$payment_date = Input::get('payment_date');
		$width = Input::get('width');
		$length = Input::get('length');
		
		$grave = new Grave();
		
		$grave->id = $place->id;
		$grave->id_type = $type->id;
		$grave->payment_date = $payment_date;
		$grave->width = $width;
		$grave->length = $length;
		
		$graves = Grave::all();
		foreach($graves as $check)
		{
				if($check->id == $place->id)
				{
					$info = "To miejsce jest już zajęte";
					return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
				}
		}
		
		
		$grave->save();
		$info = "Poprawnie dodano nowy grób";
	
		
		return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);		
		
	}

}
