<?php

class PlacesController extends BaseController {

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
		$info = '';
		
		return View::make('places.places')->with('info', $info);
	}
	
	public function downloadExcel($type)
	{
		/*$data = DB::table('buried')
			->join('graves', 'buried.id_grav', '=', 'graves.id')
			->join('places', 'graves.id_place', '=', 'places.id')
			->join('dispatchers', 'graves.id_dis', '=', 'dispatchers.id')
			->join('typesofgraves', 'graves.id_type', '=', 'typesofgraves.id')
			->select('buried.first_name', 'buried.last_name', 'buried.family_name', 'buried.date_of_birth', 'buried.date_of_death', 'buried.date_of_burial', 'buried.registration_number',
			'buried.street', 'buried.building', 'buried.post_code', 'buried.city', 'buried.note', 'buried.image',
			'graves.image as imageG', 'graves.payment_date', 'graves.width', 'graves.length',
			'places.sector', 'places.row', 'places.number', 'places.x', 'places.y', 'places.width as width_place', 'places.length as length_place',
			'dispatchers.first_name as first_name_dis', 'dispatchers.last_name as last_name_dis', 'dispatchers.phone_number', 'dispatchers.street as street_dis',  'dispatchers.building as building_dis',
			'dispatchers.post_code as post_code_dis',  'dispatchers.city as city_dis', 'typesofgraves.type')
			->get();

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

			*/
			
		//$data = DB::table('buried')
		//	->join('graves', 'buried.id_grav', '=', 'graves.id')->get();	
			
		//dd($data);
			
		
		$data1 = DB::table('buried')->get();
		//$data1 = Buried::get()->toArray();
		//$data=DB::select('select * from buried where first_name :first_name',['first_name' 'LIKE' "%{$first_name}%"]);
		//$data = DB::table('buried')->where('last_name','LIKE', $last_name)->union($data2)->get();
		//$data3 = DB::table('graves');
		$data2=DB::table('places')->get();
		//$data2=Place::get()->toArray();
		
		
		
		//$dataArr = array();
		$data = array();
		$count=0;
		
		foreach($data1 as $dat1)//pochowani
		{
			$temp=DB::table('graves')->where('id',"{$dat1->id_grav}")->get();//grob przypisany do pochowanego
			foreach ($data2 as $dat2)//miejsca
			{
				foreach($temp as $tem) // zawsze tylko jeden obiekt taki bedzie
				{
					if($dat2->id == $tem->id_place)
					{
					//$data[$count] = $dat1->first_name.' '.$dat1->last_name.' '.$dat1->family_name.' '.$dat1->date_of_birth.' '.$dat1->date_of_death.' '.$dat1->date_of_burial.' '.$dat2->sector.' '.$dat2->row.' '.$dat2->number;
					$data[$count] = array_merge((array) $dat1, (array) $dat2);
					$count=$count+1;
					}
				}
			}
		}		
		
		//$data = Place::get();
		//dd($data);
		return Excel::create('Miejsca na cmentarzu', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
			$excel->sheet('test', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	
	public function postDelete($id)
	{
		$delete = Place::find($id);
		$place = DB::table('places')->where('places.id',$id)->first();
		if($delete->status == true)
		{
			$info = 'To miejsce jest zajęte, najpierw musisz usunąć grób.';
			return View::make('places.view')->with('id', $id)->with('place', $place)->with('info', $info);
		}
		
		$delete->delete();
		
		$info = 'Miejsce usunięte poprawnie.';
		$places = Place::all();
		return View::make('places.all')->with('places', $places)->with('info', $info);
	}
	
	public function postEdit($id)
	{
		$place = DB::table('places')->where('id', $id)->first();
		
		$update = Place::find($id);
		
		$sector = Input::get('sector');
		$row = Input::get('row');
		$number = Input::get('number');
		$x = Input::get('x');
		$y = Input::get('y');
		$width = Input::get('width');
		$length = Input::get('length');
		$status = $update->status;
		$info = '';
		
		$places = Place::all();
		
		foreach($places as $pl)
        {
			if($update->id != $pl->id && $sector == $pl->sector && $row == $pl->row && $number == $pl->number)
			{
				$info = 'Miejsce o podanym sektorze, rzędzie i numerze już istnieje.';
				return View::make('places.edit')->with('id', $id)->with('place', $place)->with('info', $info);
			}
		}
		
		$graves = Grave::all();
		
		foreach($graves as $grave)
        {
			if($grave->id_place == $place->id && ($grave->width > $width || $grave->length > $length))
			{
				$info = 'Nie można edytować, grób jest większy od miejsca, szerokość grobu '
				.$grave->width.' cm, długość '.$grave->length.' cm.';
				return View::make('places.edit')->with('id', $id)->with('place', $place)->with('info', $info);
			}
		}
		
		$update->sector = $sector;
		$update->row = $row;
		$update->number = $number;
		$update->x = $x;
		$update->y = $y;
		$update->width = $width;
		$update->length = $length;		
		$update->save();
		$place = DB::table('places')->where('id', $id)->first();
		$info = 'Poprawnie edytowano dane.';
		
		return View::make('places.edit')->with('id', $id)->with('place', $place)->with('info', $info);
	}
	
	public function getEdit($id)
	{
		$place = DB::table('places')->where('id', $id)->first(); 				
		$info = '';
		
		return View::make('places.edit')->with('id', $id)->with('place', $place)->with('info', $info);
	}
	
	public function getView($id)
	{
		$place = DB::table('places')->where('places.id',$id)->first();
		$info = '';
		
		$x = $place->x/1000000;
		$y = $place->y/1000000;
		
		$vars = explode(".",$x);
		$x1 = $vars[0];
		$tempma = "0.".$vars[1];

		$tempma = $tempma * 3600;
		$x2 = floor($tempma / 60);
		$x3 = $tempma - ($x2*60);
		
		$vars = explode(".",$y);
		$y1 = $vars[0];
		$tempma = "0.".$vars[1];

		$tempma = $tempma * 3600;
		$y2 = floor($tempma / 60);
		$y3 = $tempma - ($y2*60);
		
		$xd = $x1.'°'.$x2.'\''.$x3.'"';
		$yd = $y1.'°'.$y2.'\''.$y3.'"';
		
		return View::make('places.view')->with('id', $id)->with('place', $place)->with('info', $info)->with('xd', $xd)->with('yd', $yd);
	}
	
	public function postAdd()
	{
		$sector = Input::get('sector');
		$row = Input::get('row');
		$number = Input::get('number');
		$x1 = Input::get('x1');
		$x2 = Input::get('x2');
		$x3 = Input::get('x3');
		$y1 = Input::get('y1');
		$y2 = Input::get('y2');
		$y3 = Input::get('y3');
		$width = Input::get('width');
		$length = Input::get('length');
		
		$x = ($x1+$x2/60+$x3/3600)*1000000;
		$y = ($y1+$y2/60+$y3/3600)*1000000;
		
		$place = new Place();
		
		$place->sector = $sector;
		$place->row = $row;
		$place->number = $number;
		$place->x = $x;
		$place->y = $y;
		$place->width = $width;
		$place->length = $length;
		$place->status = false;
		$place->id_cem = 1;
		
		$place->save();
		$info = "Poprawnie stworzono nowe miejsce";
	
		return View::make('places.places')->with('info', $info);	
	}

	public function getAll()
	{
		$places = Place::all();
		$info = '';
		
		if ($_GET['sort'] == null)
		{	
			return View::make('places.all')->with('places', $places)->with('info', $info);
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
		if ($_GET['sort'] == 'number')
		{
			$sql = "places.number";
		}
		if ($_GET['sort'] == 'x')
		{
			$sql = "places.x";
		}
		if ($_GET['sort'] == 'y')
		{
			$sql = "places.y";
		}
		if ($_GET['sort'] == 'width')
		{
			$sql = "places.width";
		}
		if ($_GET['sort'] == 'length')
		{
			$sql = "places.length";
		}
		if ($_GET['sort'] == 'status')
		{
			$sql = "places.status";
		}
		
		$placesArr = DB::table('places')
		->orderBy($sql,$how)
		->get();
		
		return View::make('places.all')->with('places', $placesArr)->with('info', $info);
	
	}
	
	private function arrayPlaces()
	{
		$places = Place::all();
        $placesArr = array();
        foreach($places as $place)
        {
			//if($place->status == false)
			//{	
			$placesArr[$place->id] = 'Sektor '.$place->sector.', rząd '.$place->row. ', numer '.$place->number;
			//}
		}
		
		return $placesArr;
	}
}