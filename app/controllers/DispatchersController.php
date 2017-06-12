<?php

class DispatchersController extends BaseController {

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
		$dispatchersArr = $this->arrayDispatchers();
		$gravesArr = $this->arrayGraves();
		
		$info = '';
		$info2 = '';
		
		return View::make('dispatchers.dispatchers')->with('info', $info)->with('info2', $info2)
													->with('dispatchers', $dispatchersArr)->with('graves', $gravesArr);
	}
	
	public function downloadExcel($type)
	{
		$data = Dispatcher::get()->toArray();
		return Excel::create('Dysponenci', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	
	public function postDelete($id)
	{
		$delete = Dispatcher::find($id);
		$dispatcher = DB::table('dispatchers')->where('dispatchers.id',$id)->first();
		$graves = Grave::all();
		
		foreach($graves as $grave)
		{
			if($grave->id_dis == $id)
			{
				$place = DB::table('places')->where('id',$grave->id_place)->first();
				$info = 'Ten dysponent jest powiązany z grobem '.$place->sector.'|'.$place->row.'|'.$place->number
						.', najpierw musisz usunąć grób.';
				return View::make('dispatchers.view')->with('id', $id)->with('dispatcher', $dispatcher)->with('info', $info);
			}
		}
		
		$delete->delete();
		
		$info = 'Dysponent usunięte poprawnie.';
		$dispatchers = Dispatcher::all();
		return View::make('dispatchers.all')->with('id', $id)->with('dispatchers', $dispatchers)->with('info', $info);
	}

	public function postEdit($id)
	{
		
		$update = Dispatcher::find($id);
		
		$last_name = Input::get('last_name');
		$first_name = Input::get('first_name');
		$phone_number = Input::get('phone_number');
		$street = Input::get('street');
		$building = Input::get('building');
		$post_code = Input::get('post_code');
		$city = Input::get('city');
		
		$update->last_name = $last_name;
		$update->first_name = $first_name;
		$update->phone_number = $phone_number;
		$update->street = $street;
		$update->building = $building;
		$update->post_code = $post_code;
		$update->city = $city;
		
		$update->save();
		
		$dispatcher = DB::table('dispatchers')->where('id', $id)->first();
		
		$info = 'Poprawnie edytowano dane.';
		
		return View::make('dispatchers.edit')->with('id', $id)->with('dispatcher', $dispatcher)->with('info', $info);
	}
	
	public function getEdit($id)
	{
		$dispatcher = DB::table('dispatchers')->where('id', $id)->first(); 				
		$info = '';
		
		return View::make('dispatchers.edit')->with('id', $id)->with('dispatcher', $dispatcher)->with('info', $info);
	}
	
	public function getView($id)
	{
		$dispatcher = DB::table('dispatchers')->where('dispatchers.id',$id)->first();
		$info = '';
		
		return View::make('dispatchers.view')->with('id', $id)->with('dispatcher', $dispatcher)->with('info', $info);
	}
	
	public function postAdd()
	{
		$dispatchersArr = $this->arrayDispatchers();
		$gravesArr = $this->arrayGraves();
				
		$last_name = Input::get('last_name');
		$first_name = Input::get('first_name');
		$phone_number = Input::get('phone_number');
		$street = Input::get('street');
		$building = Input::get('building');
		$post_code = Input::get('post_code');
		$city = Input::get('city');
		
		$dispatcher = new Dispatcher();
		
		$dispatcher->last_name = $last_name;
		$dispatcher->first_name = $first_name;
		$dispatcher->phone_number = $phone_number;
		$dispatcher->street = $street;
		$dispatcher->building = $building;
		$dispatcher->post_code = $post_code;
		$dispatcher->city = $city;
		
		$dispatcher->save();
		$info = "Poprawnie dodano dysponenta grobu.";
		$info2 = '';
	
		return View::make('dispatchers.dispatchers')->with('info', $info)->with('info2', $info2)
													->with('dispatchers', $dispatchersArr)->with('graves', $gravesArr);		
	}
	
	public function postAssign()
	{
		$dispatchersArr = $this->arrayDispatchers();
		$gravesArr = $this->arrayGraves();
		
		$dispatcher = DB::table('dispatchers')->where('id', Input::get('dispatcher_select'))->first();
		$grave = DB::table('graves')->where('id', Input::get('grave_select'))->first();
		
		if($dispatcher==null || $grave==null)
		{
			$info = '';
			$info2 = "Nie wybrano jednej z opcji.";
		
			return View::make('dispatchers.dispatchers')->with('info', $info)->with('info2', $info2)
													->with('dispatchers', $dispatchersArr)->with('graves', $gravesArr);
		}
		
		$graveUpdate = Grave::find($grave->id);
		$graveUpdate->id_dis = $dispatcher->id;
		$graveUpdate->save();
		$info = '';
		$info2 = "Poprawnie przypisano dysponenta grobu.";
		
		return View::make('dispatchers.dispatchers')->with('info', $info)->with('info2', $info2)
													->with('dispatchers', $dispatchersArr)->with('graves', $gravesArr);		
	}
	
	public function getAll()
	{
		$dispatchers = Dispatcher::all();
		$info = '';
		
		if ($_GET['sort'] == null)
		{	
			return View::make('dispatchers.all')->with('dispatchers', $dispatchers)->with('info', $info);
		}
		
		$how=$_GET['order'];
		if ($_GET['sort'] == 'first_name')
		{
			$sql = "dispatchers.first_name";
		}
		if ($_GET['sort'] == 'last_name')
		{
			$sql = "dispatchers.last_name";
		}
		if ($_GET['sort'] == 'phone_number')
		{
			$sql = "dispatchers.phone_number";
		}
		if ($_GET['sort'] == 'city')
		{
			$sql = "dispatchers.city";
		}
		if ($_GET['sort'] == 'post_code')
		{
			$sql = "dispatchers.post_code";
		}
		
		$dispatchersArr = DB::table('dispatchers')
		->orderBy($sql,$how)
		->get();
		
		return View::make('dispatchers.all')->with('dispatchers', $dispatchersArr)->with('info', $info);
	
	}
	
	private function arrayDispatchers()
	{
		$dispatchers = Dispatcher::all();
        $dispatchersArr = array();
        foreach($dispatchers as $dispatcher)
        {
            $dispatchersArr[$dispatcher->id] = $dispatcher->last_name.' '.$dispatcher->first_name.', adres: ul. '
											  .$dispatcher->street.' '.$dispatcher->building.', '.$dispatcher->post_code.' '.$dispatcher->city;
		}
		
		return $dispatchersArr;
	}
	
	private function arrayGraves()
	{
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
