<?php

class SortController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sorts = Sort::orderBy('created_at', 'desc')->paginate(PAGINATE_SORT);
		return View::make('admin.sort.index')->with(compact('sorts'));
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
		$sort = Sort::find($id);
		return View::make('admin.sort.show')->with(compact('sort'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sort = Sort::find($id);
		return View::make('admin.sort.edit')->with(compact('sort'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		Common::update($id, $input);
		return Redirect::route('admin.sort.index')->with('message','Update thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$listCategoryId = Sort::find($id)->categories;
		foreach ($listCategoryId as $key => $value) {
			$listProductId = Category::find($value->id)->products;
			Common::deleteRelate($listProductId, 'Product');
		}
		Common::deleteRelate($listCategoryId, 'Category');
		Common::delete($id);
		return Redirect::route('admin.sort.index')->with('message', 'Xoá thành công');
	}


}
