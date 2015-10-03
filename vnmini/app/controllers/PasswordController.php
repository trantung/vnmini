<?php

class PasswordController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('password');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$user = User::where('email', $data['email'])->first();
		if(is_null($user)){
			return Redirect::route('password.index')->with('message', 'Email không đúng!');
		}
		$url = route('user.change.pass').'?parram=';
		$parram = json_encode($data);
		$encoded =( urlencode(base64_encode($parram)));
		$url.=$encoded;
		$mailData = ['url'=>$url];
		Mail::send('emails.changepass', $mailData, function($message) use ($user,$data) {
		    $message->to($data['email'], 'Hello'.$user->name)->subject('VNMINI Authorize password');
		});
		if(Mail::failures()){
			return Redirect::route('password.index')->with('message', 'Email không đúng!');
		}
		return Redirect::route('get.admin.login')->with('message', 'Thông tin đã được gửi vào email của bạn!');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		dd(Input::all());
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getChangePass(){
		$encoded = Input::get('parram');
		$decoded = base64_decode(urldecode( $encoded ));
		$data = json_decode($decoded);
		$user = User::where('email', $data->email)->first();
		if(is_null($user)){
			return Redirect::route('get.admin.login')->with('message', 'Thông tin sai!');
		}else{
			if($data->new_password != $data->re_password){
				return Redirect::route('get.admin.login')->with('message', 'Password không giống nhau!');
			}
			else{
				$user->password = Hash::make($data->new_password);
				$user->save();
			}
		}
		return Redirect::route('get.admin.login')->with('message', 'Đổi mật khẩu thành công, mời login!');
	}

}
