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

	public function showWelcome()
	{
		return View::make('hello');
	}
	/**
	* Display Home page
	*
	* @return View Home page
	*/
	public function getIndex()
    {	
		return View::make('index');
	}
	
	/**
	* Display add manager page
	*
	* @return View add manager page
	*/
	public function getAdd()
    {	
		return View::make('add');
	}
	
	public function logout()
    {
        Confide::logout();

        return Redirect::to('/users/login');
    }
	
}
