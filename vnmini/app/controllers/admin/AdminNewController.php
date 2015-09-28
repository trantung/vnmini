<?php

class AdminNewController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = AdminNew::paginate(PAGINATE_NEWS);
		return View::make('admin.news.index')->with(compact('news'));
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$new = AdminNew::findOrFail($id);
		return View::make('admin.news.show')->with(compact('new'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$new = AdminNew::findOrFail($id);
		return View::make('admin.news.edit')->with(compact('new'));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::except('_token', '_method');
		
		$new = AdminNew::findOrFail($id);
		$new->title = $data['title'];
		$new->description = $data['description'];
		if(Input::hasFile('image')){
		    $destinationPath = public_path().'/img/news/';
		    $name = Input::file('image')->getClientOriginalName();
		    Input::file('image')->move($destinationPath, $name);
		    $extends = Input::file('image')->getClientOriginalExtension();
		    $ex = array('jpg', 'png', 'jpeg', 'gif');
		    if(in_array(strtolower($extends),$ex)){
		    	$new->image_url = '/img/news/'.Input::file('image')->getClientOriginalName();
		    }else{
		    	return Redirect::route('admin.new.edit', $id)->with('message', 'Định dạng ảnh không đúng');
		    }
			$new->image_url='/img/news/'.Input::file('image')->getClientOriginalName();
		}
		$new->save();
		return Redirect::route('admin.new.edit', $id)->with('message', 'Update thành công');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$new = AdminNew::findOrFail($id);
		$new->delete();
		return Redirect::route('admin.new.index');
	}


}
