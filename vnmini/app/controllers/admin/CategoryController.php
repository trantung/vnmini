<?php

class CategoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::orderBy('created_at', 'desc')->paginate(PAGINATE_CATEGORY);
		return View::make('admin.category.index')->with(compact('categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.category.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except("_token");
		$categoryId = Common::create($input);
		if (!$categoryId) {
			return Redirect::route('admin.category.create')->with('message', 'Tạo mới thất bại, xin thử lại');
		}
		return Redirect::route('admin.category.index')->with('message','Tạo mới thành công!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);
		return View::make('admin.category.show')->with(compact('category'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return View::make('admin.category.edit')->with(compact('category'));
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
		return Redirect::route('admin.category.index')->with('message','Update thành công!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$listProductId = Category::find($id)->products;
		Common::deleteRelate($listProductId, 'Product');
		Common::delete($id);
		return Redirect::route('admin.category.index')->with('message','Xóa thành công!');
	}


}
