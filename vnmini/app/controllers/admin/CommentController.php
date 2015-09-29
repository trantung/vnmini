<?php

class CommentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = Comment::orderBy('created_at', 'desc')->paginate(PAGINATE_COMMENT);
		return View::make('admin.comment.index')->with(compact('comments'));
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
		$comment = Comment::findOrFail($id);
		return View::make('admin.comment.show')->with(compact('comment'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::findOrFail($id);
		return View::make('admin.comment.edit')->with(compact('comment'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('status');
		Common::update($id, $input);
		return Redirect::route('admin.comment.index')->with('message', 'Sửa thành công');
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
		return Redirect::route('admin.comment.index')->with('message', 'Xoá thành công');
	}

	public function search()
	{
		$input = Input::all();
		$comments = Comment::where('status', $input)->orderBy('created_at', 'desc')->paginate(PAGINATE_COMMENT);
		return View::make('admin.comment.index')->with(compact('comments'));
	}

}
