<?php

class BuriedController extends BaseController {

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
		$gravesArr = $this->arrayGraves();
		
		$grave = DB::table('graves')->where('id', Input::get('grave_select'))->first();
		
		$info = '';
		
		return View::make('buried.buried')->with('info', $info)->with('graves', $gravesArr);
	}

    public function downloadExcel($type)
    {
        $data = Buried::get()->toArray();
        return Excel::create('Pochowani', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
	
	public function postDelete($id)
	{
		$delete = Buried::find($id);
		$delete->delete();
		
		$info = 'Pochowany usunięty poprawnie.';
		$buriedArr = DB::table('buried')
			->join('graves', 'buried.id_grav', '=', 'graves.id')
			->join('places', 'graves.id_place', '=', 'places.id')
			->select('buried.id', 'buried.first_name', 'buried.last_name', 'buried.family_name', 'places.sector', 'places.row', 'places.number', 'graves.image')
			->get();
		
		return View::make('buried.all')->with('buriedArr', $buriedArr)->with('info', $info);
	}
	
	public function postEdit($id)
	{
		$gravesArr = $this->arrayGraves();
		
		$grave = DB::table('graves')->where('id', Input::get('grave_select'))->first();
		$last_name = Input::get('last_name');
		$family_name = Input::get('family_name');
		$first_name = Input::get('first_name');
		$date_of_birth = Input::get('date_of_birth');
		$date_of_death = Input::get('date_of_death');
		$date_of_burial = Input::get('date_of_burial');
		$registration_number = Input::get('registration_number');
		$street = Input::get('street');
		$building = Input::get('building');
		$post_code = Input::get('post_code');
		$city = Input::get('city');
		$image = Input::get('image');
		$note = Input::get('note');
		
		$idB = DB::table('buried')->where('id', $id)->first();
		$idG = DB::table('graves')->where('id', $idB->id_grav)->first();
		$place = DB::table('places')->where('id', $idG->id_place)->first(); 		
		$type = DB::table('typesofgraves')->where('id', $idG->id_type)->first(); 		
		$info = '';
		
		$gravesArr[$idG->id] = $idG->id.'. '.$type->type.', '.$place->sector.'|'.$place->row.'|'.$place->number.' (Aktualne)';
		
		$buried = DB::table('buried')->where('buried.id',$id)
		->join('graves', 'buried.id_grav', '=', 'graves.id')
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('buried.*', 'places.sector', 'buried.image as imageB', 'graves.id as idG',
		'places.row', 'places.number', 'graves.image as imageG', 'graves.payment_date', 'graves.width', 'graves.length')
		->first();
		
		if($grave==null)
		{
			$info = "Nie wybrano grobu.";
			return View::make('buried.edit')->with('id', $id)->with('buried', $buried)->with('graves', $gravesArr)->with('info', $info);
		}
		
		$update = Buried::find($id);
		
		$update->id_grav = $grave->id;
		$update->last_name = $last_name;
		$update->family_name = $family_name;
		$update->first_name = $first_name;
		$update->date_of_birth = $date_of_birth;
		$update->date_of_death = $date_of_death;
		$update->date_of_burial = $date_of_burial;
		$update->registration_number = $registration_number;
		$update->street = $street;
		$update->building = $building;
		$update->post_code = $post_code;
		$update->city = $city;
		$update->image = $image;
		$update->note = $note;
		
		$update->save();
		
		$info = 'Poprawnie edytowano dane.';
		$gravesArr = $this->arrayGraves();
		$idG = DB::table('graves')->where('id', $update->id_grav)->first();
		$place = DB::table('places')->where('id', $idG->id_place)->first(); 		
		$type = DB::table('typesofgraves')->where('id', $idG->id_type)->first(); 		
		
		$gravesArr[$idG->id] = $idG->id.'. '.$type->type.', '.$place->sector.'|'.$place->row.'|'.$place->number.' (Aktualne)';
	
		return View::make('buried.edit')->with('id', $id)->with('buried', $buried)->with('graves', $gravesArr)->with('info', $info);
	}
	
	public function getEdit($id)
	{
		$gravesArr = $this->arrayGraves();
		
		$idB = DB::table('buried')->where('id', $id)->first();
		$idG = DB::table('graves')->where('id', $idB->id_grav)->first();
		$place = DB::table('places')->where('id', $idG->id_place)->first(); 		
		$type = DB::table('typesofgraves')->where('id', $idG->id_type)->first(); 		
		$info = '';
		
		$gravesArr[$idG->id] = $idG->id.'. '.$type->type.', '.$place->sector.'|'.$place->row.'|'.$place->number.' (Aktualne)';
		
		$buried = DB::table('buried')->where('buried.id',$id)
		->join('graves', 'buried.id_grav', '=', 'graves.id')
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('buried.*', 'places.sector', 'buried.image as imageB', 'graves.id as idG',
		'places.row', 'places.number', 'graves.image as imageG', 'graves.payment_date', 'graves.width', 'graves.length')
		->first();
		
		return View::make('buried.edit')->with('id', $id)->with('buried', $buried)->with('graves', $gravesArr)->with('info', $info);
	}
	
	public function getView($id)
	{
		$buried = DB::table('buried')->where('buried.id',$id)
		->join('graves', 'buried.id_grav', '=', 'graves.id')
		->join('places', 'graves.id_place', '=', 'places.id')
		->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
		->select('buried.*', 'places.sector', 'buried.image as imageB', 'graves.id as idG',
		'places.row', 'places.number', 'graves.image as imageG', 'graves.payment_date', 'graves.width', 'graves.length')
		->first();
		
		$info = '';
		
		return View::make('buried.view')->with('id', $id)->with('buried', $buried)->with('info', $info);
	}
	
	public function postAdd()
	{
		$gravesArr = $this->arrayGraves();
		
		$grave = DB::table('graves')->where('id', Input::get('grave_select'))->first();
		$last_name = Input::get('last_name');
		$family_name = Input::get('family_name');
		$first_name = Input::get('first_name');
		$date_of_birth = Input::get('date_of_birth');
		$date_of_death = Input::get('date_of_death');
		$date_of_burial = Input::get('date_of_burial');
		$registration_number = Input::get('registration_number');
		$street = Input::get('street');
		$building = Input::get('building');
		$post_code = Input::get('post_code');
		$city = Input::get('city');
		$image = Input::get('image');
		$note = Input::get('note');
		
		if($grave==null)
		{
			$info = "Nie wybrano grobu.";
			return View::make('buried.buried')->with('info', $info)->with('graves', $gravesArr);
		}
		
		$buried = new Buried();
		
		$buried->id_grav = $grave->id;
		$buried->last_name = $last_name;
		$buried->family_name = $family_name;
		$buried->first_name = $first_name;
		$buried->date_of_birth = $date_of_birth;
		$buried->date_of_death = $date_of_death;
		$buried->date_of_burial = $date_of_burial;
		$buried->registration_number = $registration_number;
		$buried->street = $street;
		$buried->building = $building;
		$buried->post_code = $post_code;
		$buried->city = $city;
		$buried->image = $image;
		$buried->note = $note;
		
		$buried->save();		
		
		$info = 'Pochowany dodany poprawnie.';
		
		return View::make('buried.buried')->with('info', $info)->with('graves', $gravesArr);
	}
	
	public function getAll()
	{
		$buried = Buried::all();
		$info = '';
		
		if ($_GET['sort'] == null)
		{
			$buriedArr = DB::table('buried')
			->join('graves', 'buried.id_grav', '=', 'graves.id')
			->join('places', 'graves.id_place', '=', 'places.id')
			->select('buried.id', 'buried.first_name', 'buried.last_name', 'buried.family_name', 'places.sector', 'places.row', 'places.number', 'graves.image')
			->get();
		
			return View::make('buried.all')->with('buriedArr', $buriedArr)->with('info', $info);
		}
		
		$how=$_GET['order'];
		if ($_GET['sort'] == 'first_name')
		{
			$sql = "buried.first_name";
		}
		if ($_GET['sort'] == 'last_name')
		{
			$sql = "buried.last_name";
		}
		if ($_GET['sort'] == 'family_name')
		{
			$sql = "buried.family_name";
		}
		
		$buriedArr = DB::table('buried')
		->join('graves', 'buried.id_grav', '=', 'graves.id')
		->join('places', 'graves.id_place', '=', 'places.id')
		->select('buried.id', 'buried.first_name', 'buried.last_name', 'buried.family_name', 'places.sector', 'places.row', 'places.number', 'graves.image')
		->orderBy($sql,$how)
		->get();
		
		return View::make('buried.all')->with('buriedArr', $buriedArr)->with('info', $info);
	}
	
	private function arrayGraves()
	{
		$info = '';
		
		$graves = Grave::all();
        $gravesArr = array();
        foreach($graves as $grave)
        {
            $place = DB::table('places')->where('id', $grave->id_place)->first();
            $type = DB::table('typesOfGraves')->where('id', $grave->id_type)->first();
			$gravesArr[$grave->id] = $grave->id.'. '.$type->type.', '.$place->sector.'|'.$place->row.'|'.$place->number;
		}
		
		return $gravesArr;
	}
}
