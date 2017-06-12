<?php

class SearchController extends BaseController {

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
		$last_name = Input::get('last_name');
		$first_name = Input::get('first_name');
		$family_name = Input::get('family_name');
		$date_of_birth = Input::get('date_of_birth');
		$date_of_death = Input::get('date_of_death');
		$date_of_burial = Input::get('date_of_burial');
		$sector = Input::get('sector');
		$row = Input::get('row');
		$number = Input::get('number');
		
		//$data3 = DB::table('graves');
		//$first_name=='' ? '!=':'LIKE';
		//$data2 = DB::table('buried')->where('first_name','LIKE', $first_name);
		$data1 = DB::table('buried')->where('first_name','LIKE', "%{$first_name}%")->where('last_name','LIKE', "%{$last_name}%")->where('family_name','LIKE', "%{$family_name}%")->where('date_of_birth','LIKE', "%{$date_of_birth}%")->where('date_of_death','LIKE', "%{$date_of_death}%")->where('date_of_burial','LIKE', "%{$date_of_burial}%")->get();
		//$data=DB::select('select * from buried where first_name :first_name',['first_name' 'LIKE' "%{$first_name}%"]);
		//$data = DB::table('buried')->where('last_name','LIKE', $last_name)->union($data2)->get();
		//$data3 = DB::table('graves');
		$data2=DB::table('places')->where('sector','LIKE', "%{$sector}%")->where('row','LIKE', "%{$row}%")->where('number','LIKE', "%{$number}%")->get();
		
		
		
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
					$data[$count] = (object) array_merge((array) $dat1, (array) $dat2);
					$count=$count+1;
					}
				}
			}
		}
		
		return View::make('search')->with('data', $data);
	}

}
