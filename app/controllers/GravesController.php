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
		$placesArr = $this->arrayPlaces();
		$typesArr = $this->arrayTypes();
		
		$info = '';
		
		return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
	}
	
	public function downloadExcel($type)
	{
		$data = Grave::get()->toArray();
		return Excel::create('Groby na cmentarzu', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	
	public function postDelete($id)
	{
		$delete = Grave::find($id);
		$grave = DB::table('places')->where('places.id',$id)->first();
		$buried = Buried::all();
		
		foreach($buried as $bur)
		{
			if($bur->id_grav == $id)
			{
				$info = 'Ten grób jest powiązany z osobą pochowaną, najpierw usuń pochowanego.';
				$grave = DB::table('graves')->where('graves.id',$id)
				->join('places', 'graves.id_place', '=', 'places.id')
				->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
				->select('graves.id', 'graves.payment_date', 'graves.width', 'graves.length', 'typesofgraves.type', 'places.sector', 'places.row', 'places.number', 'graves.image')
				->first();

				return View::make('graves.view')->with('id', $id)->with('grave', $grave)->with('info', $info);
			}
		}
		
		$delete->delete();
		
		$info = 'Grób usunięty poprawnie.';
		$gravesArr = DB::table('graves')
			->join('places', 'graves.id_place', '=', 'places.id')
			->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
			->select('graves.id', 'typesofgraves.type', 'graves.width', 'graves.length', 'places.sector', 'places.row', 'places.number', 'graves.image')
			->get();

		return View::make('graves.all')->with('gravesArr', $gravesArr)->with('info', $info);
	}
	
	public function getEdit($id)
	{
		//$grave = DB::table('graves')->where('id',$id)->first();
		$placesArr = $this->arrayPlaces();
		$typesArr = $this->arrayTypes();
		
		$idP = DB::table('graves')->where('id', $id)->first();
		$place = DB::table('places')->where('id', $idP->id_place)->first(); 		
		$type = DB::table('typesofgraves')->where('id', $idP->id_type)->first(); 		
		$info = '';
		
		$placesArr[$place->id] = 'Sektor '.$place->sector.', rząd '.$place->row. ', numer '.$place->number.' (Aktualne)';
		$typesArr[$type->id] = $type->type.' (Aktualne)'; 
		
		$grave = DB::table('graves')->where('graves.id',$id)
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('graves.id', 'graves.payment_date', 'graves.width', 'graves.length', 'typesofgraves.type', 'places.sector', 'places.row', 'places.number', 'graves.image')
		->first();
		
		return View::make('graves.edit')->with('id', $id)->with('grave', $grave)->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
	}
	
	public function postEdit($id)
	{
		$place = DB::table('places')->where('id', Input::get('place_select'))->first();
		$type = DB::table('typesOfGraves')->where('id', Input::get('type_select'))->first();
		$payment_date = Input::get('payment_date');
		$width = Input::get('width');
		$length = Input::get('length');
		$image = Input::get('image');
		
		$placesArr = $this->arrayPlaces();
		$typesArr = $this->arrayTypes();
		
		$idP = DB::table('graves')->where('id', $id)->first();
		$place2 = DB::table('places')->where('id', $idP->id_place)->first(); 		
		$type2 = DB::table('typesofgraves')->where('id', $idP->id_type)->first(); 		
		$info = '';
		
		$placesArr[$place2->id] = 'Sektor '.$place2->sector.', rząd '.$place2->row. ', numer '.$place2->number.' (Aktualne)';
		$typesArr[$type2->id] = $type2->type.' (Aktualne)';
		
		$grave = DB::table('graves')->where('graves.id',$id)
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('graves.id', 'graves.payment_date', 'graves.width', 'graves.length', 'typesofgraves.type', 'places.sector', 'places.row', 'places.number', 'graves.image')
		->first();
		
		if($place==null)
		{
			$info = "Nie wybrano miejsca.";
			return View::make('graves.edit')->with('id', $id)->with('grave', $grave)->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
		}
		
		if($type==null)
		{
			$info = "Nie wybrano typu grobu.";
			return View::make('graves.edit')->with('id', $id)->with('grave', $grave)->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
		}
		
		if($width > $place->width || $length > $place->length)
		{
			$info = "Grób nie może być większy od miejsca, wymiary miejsca: szerokość "
					.$place->width." cm, długość ".$place->length." cm.";
			return View::make('graves.edit')->with('id', $id)->with('grave', $grave)->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
       	}
		
		$update = Grave::find($id);
		
		$update->id_place = $place->id;
		$update->id_type = $type->id;
		$update->payment_date = $payment_date;
		$update->width = $width;
		$update->length = $length;
		$update->image = $image;
	
		if($place->id != $place2->id)
		{
			DB::table('places')->where('id', $place->id)->update(array('status' => true));
			DB::table('places')->where('id', $place2->id)->update(array('status' => false));
		}
		
		$update->save();
		$info = 'Poprawnie edytowano dane.';
		$placesArr = $this->arrayPlaces();
		$typesArr = $this->arrayPlaces();
		$idP = DB::table('graves')->where('id', $update->id)->first();
		$place2 = DB::table('places')->where('id', $idP->id_place)->first(); 		
		$type2 = DB::table('typesofgraves')->where('id', $idP->id_type)->first(); 		
		
		$placesArr[$place2->id] = 'Sektor '.$place2->sector.', rząd '.$place2->row. ', numer '.$place2->number.' (Aktualne)';
		$typesArr[$type2->id] = $type2->type.' (Aktualne)';
	
		return View::make('graves.edit')->with('id', $id)->with('grave', $grave)->with('info', $info)->with('places', $placesArr)->with('types', $typesArr);
	}
	
	public function getView($id)
	{
		$grave = DB::table('graves')->where('graves.id',$id)
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('graves.id', 'graves.payment_date', 'graves.width', 'graves.length', 'typesofgraves.type', 'places.sector', 'places.row', 'places.number', 'graves.image')
		->first();
		
		$info = '';
		
		return View::make('graves.view')->with('id', $id)->with('grave', $grave)->with('info', $info);
	}
	
	public function postAdd()
	{
		$placesArr = $this->arrayPlaces();
		$typesArr = $this->arrayTypes();
		
		$place = DB::table('places')->where('id', Input::get('place_select'))->first();
		$type = DB::table('typesOfGraves')->where('id', Input::get('type_select'))->first();
		$payment_date = Input::get('payment_date');
		$width = Input::get('width');
		$length = Input::get('length');
		$image = Input::get('image');
		
		if($place==null)
		{
			$info = "Nie wybrano miejsca.";
			return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
		}
		
		if($type==null)
		{
			$info = "Nie wybrano typu grobu.";
			return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
		}
		
		if($width > $place->width || $length > $place->length)
		{
			$info = "Grób nie może być większy od miejsca, wymiary miejsca: szerokość "
					.$place->width." cm, długość ".$place->length." cm.";
			return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
       	}
		
		$grave = new Grave();
		
		$grave->id_place = $place->id;
		$grave->id_type = $type->id;
		$grave->payment_date = $payment_date;
		$grave->width = $width;
		$grave->length = $length;
		$grave->image = $image;
		
		$graves = Grave::all();
		foreach($graves as $check)
		{
				if($check->id_place == $place->id)
				{
					$info = "To miejsce jest już zajęte, spróbuj ponownie.";
					return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);
				}
		}

		DB::table('places')->where('id', Input::get('place_select'))->update(array('status' => true));
		$grave->save();
		$info = "Poprawnie dodano nowy grób.";
		$placesArr = $this->arrayPlaces();
	
		return View::make('graves.graves')->with('places', $placesArr)->with('types', $typesArr)->with('info', $info);		
		
	}
	
	public function getAll()
	{
		$graves = Grave::all();
		$gravesArr = array();
		$info = '';

		if ($_GET['sort'] == null)
		{
			$gravesArr = DB::table('graves')
			->join('places', 'graves.id_place', '=', 'places.id')
			->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
			->select('graves.id', 'typesofgraves.type', 'graves.width', 'graves.length', 'places.sector', 'places.row', 'places.number', 'graves.image')
			->get();

			return View::make('graves.all')->with('gravesArr', $gravesArr)->with('info', $info);
		}

		$how=$_GET['order'];
		if ($_GET['sort'] == 'sector')
		{
			$sql = "places.sector";
		}
		if ($_GET['sort'] == 'row')
		{
			$sql = "places.row";
		}
		if ($_GET['sort'] == 'type')
		{
			$sql = "typesofgraves.type";
		}
		if ($_GET['sort'] == 'number')
		{
			$sql = "places.number";
		}

		$gravesArr = DB::table('graves')
			->join('places', 'graves.id_place', '=', 'places.id')
			->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
			->select('graves.id', 'typesofgraves.type', 'graves.width', 'graves.length', 'places.sector', 'places.row', 'places.number', 'graves.image')
			->orderBy($sql, $how)
			->get();

		return View::make('graves.all')->with('gravesArr', $gravesArr)->with('info', $info);
	}
	
	private function arrayPlaces()
	{
		$places = Place::all();
        $placesArr = array();
        foreach($places as $place)
        {
			if($place->status == false)
			{	
				$placesArr[$place->id] = 'Sektor '.$place->sector.', rząd '.$place->row. ', numer '.$place->number;
			}
		}
		
		return $placesArr;
	}
	
	private function arrayTypes()
	{
		
		$types = TypeGraves::all();
		$typesArr = array();
        foreach($types as $type)
        {
            $typesArr[$type->id] = $type->type;
		}
		
		return $typesArr;
	}
}
