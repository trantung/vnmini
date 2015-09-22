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
		return View::make('admin.products.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token', 'image_relate');
		$validator = CommonProduct::validate($input);
		if ($validator->fails()) {
            return Redirect::route('admin.products.create')
                ->withInput($input)
                ->withErrors($validator);
        }
        $input['image_url'] = CommonProduct::uploadImage($input, PATH_PRODUCT);
		$input['status'] = CommonProduct::getStatus($input);
		$productId = Common::create($input);
		CommonProduct::createImageRelate(Input::only('image_relate'), $productId);
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
		$product = Product::find($id);
		return View::make('admin.products.show')->with(compact('product'));
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
		Common::delete($id);
		return Redirect::route('admin.products.index')->with('message', 'Xoá thành công');
	}

	public function search()
	{
		$input = Input::all();
		if (!$input['category_id'] && !$input['name'] && !$input['code']) {
			return Redirect::route('admin.products.index');
		}
		$products = CommonProduct::search($input);
		$categories = Category::all(['id', 'name']);
		return View::make('admin.products.index')->with(compact('products', 'categories'));
	}

}
