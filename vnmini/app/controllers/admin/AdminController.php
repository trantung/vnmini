<?php

class AdminController extends BaseController {
	public function __construct()
	{
        $this->beforeFilter('admin', array('except'=>array('getLogin','postLogin')));
	}

	public function getLogin()
	{
        return View::make('admin.login');
	}

	public function postLogin()
	{
		$input = Input::all();
        $login = Auth::attempt(array('email'=>$input['email'],'password'=>$input['password']));
        if($login){

            return Redirect::route('get.admin.index');
        }
        else{
            
            return View::make('admin.login')->withErrors('Sai email hoặc password');
        }
	}

	public function getIndex()
	{
		return View::make('admin.index');
	}
}