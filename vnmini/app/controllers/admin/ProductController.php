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
		if (!$productId) {
			return Redirect::route('admin.products.index')->with('message', 'Tạo mới thất bại');
		}
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
		$imageRelates = $product->images;
		return View::make('admin.products.show')->with(compact('product', 'imageRelates'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
		$imageRelates = $product->images;
		return View::make('admin.products.edit')->with(compact('product', 'imageRelates'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token','image', 'image_relate');
		$validator = CommonProduct::validate($input);
		if ($validator->fails()) {
            return Redirect::route('admin.products.edit', $id)
                ->withInput($input)
                ->withErrors($validator);
        }
        if (Input::get('image_relate')) {
			CommonProduct::createImageRelate(Input::only('image_relate'), $id);
        }
        if (Input::get('image')) {
			CommonProduct::updateRelateImage(Input::only('image'), $id);
        }
		if ($input['image_url']) {
        	$input['image_url'] = CommonProduct::uploadImage($input, PATH_PRODUCT);
			Common::update($id, $input);
		}
		if (!$input['image_url']) {
			$input['image_url'] = Product::find($id)->image_url;
			Common::update($id, $input);
		}
		return Redirect::route('admin.products.index')->with('message', 'Update thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$imageRelates = $product->images;
		foreach ($imageRelates as $key => $value) {
			AdminImage::find($value->id)->delete();
		}
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
