<?php

class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(PAGINATE_USER);
		return View::make('admin.users.index')->with(compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$input['password'] = Hash::make($input['password']);
		Common::create($input);
		return Redirect::route('admin.user.index')->with('message', 'Tạo mới user thành công');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return View::make('admin.users.show')->with(compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$roles = Role::all(['id', 'name']);
		return View::make('admin.users.edit')->with(compact('user', 'roles'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);
		if (Request::ajax())
		{
			$data = Input::all();
			$errors = array();
			if(Hash::check($data['old_password'], $user->password)){
				$message = checkPassword($data['new_password'], $data['re_password']);
				if(isset($message['success'])){
					$user->password = Hash::make($data['new_password']);
					$user->save();			}
				return Response::json($message);
			}else{
				return Response::json(['error'=>"Mật khẩu cũ sai!"]);
			}

		}
		$data = Input::except('_token','_method');
		$user->update($data);
		return Redirect::route('admin.user.show', $id)->with('message','Update thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::delete($id);
		return Redirect::route('admin.user.index')->with('message','Xóa thành công!');
	}

	public function getForgotPassword() {
		dd('thai');
	}
	public function postForgotPassword() {

	}

}
