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
		$productId = Common::create($input);
        $input['image_url'] = CommonProduct::uploadImage($input, PATH_PRODUCT.'/'.$productId);
		// dd($input['image_url']);
		Common::update($productId, ['image_url' => $input['image_url']]);
		$input['status'] = CommonProduct::getStatus($input);
		if (!$productId) {
			return Redirect::route('admin.products.index')->with('message', 'Tạo mới thất bại');
		}
		if (Input::get('image_relate')) {
			CommonProduct::createImageRelate(Input::only('image_relate'), $productId);
		}
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
        if (Input::only('image_relate')) {
			CommonProduct::createImageRelate(Input::only('image_relate'), $id);
        }
		if ($input['image_url']) {
        	$input['image_url'] = CommonProduct::uploadImage($input, PATH_PRODUCT.'/'.$id);
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
		// dd($product->images->toArray());
		$orders = $product->orders;
		if (!empty($orders->toArray())) {
			return Redirect::route('admin.products.show', $id)->with('message', 'Không thế xoá sản phẩm đã có trong hoá đơn');
		}
		if (!empty($product->images->toArray())) {
			Common::deleteRelate($imageRelates, 'AdminImage');
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
