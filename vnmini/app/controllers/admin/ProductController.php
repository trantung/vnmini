<?php

class ProductController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::orderBy('created_at', 'desc')->paginate(PAGINATE_PRODUCT);
		$categories = Category::all(['id', 'name']);
		return View::make('admin.products.index')->with(compact('products', 'categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();
		return View::make('admin.products.create')->with(compact('categories'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$input['status'] = CommonProduct::getStatus($input);
		Common::create($input);
		return Redirect::route('admin.products.index')->with('message', 'Tạo mới thành công');
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
		//
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

	public function search()
	{
		$input = Input::all();
		if (!$input['category_id'] && !$input['name']) {
			return Redirect::route('admin.products.index');
		}
		$products = CommonProduct::search($input);
		$categories = Category::all(['id', 'name']);
		return View::make('admin.products.index')->with(compact('products', 'categories'));
	}

}
