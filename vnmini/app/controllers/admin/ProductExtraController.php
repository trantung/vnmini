<?php

class ProductExtraController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = ProductRelate::lists('relate_id');
		$products = Product::whereIn('id', $input)->paginate(PAGINATE_PRODUCT);
		$categories = Category::all(['id', 'name']);
		return View::make('admin.product_extra.index')->with(compact('products', 'categories'));
	}

	public function search()
	{
		$input = Input::all();
		if (!$input['name'] && !$input['code']) {
			return Redirect::route('admin.product_extra.index');
		}
		$products = CommonProduct::search($input);
		return View::make('admin.product_extra.index')->with(compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.product_extra.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$relate = array();
		$relate['product_id'] = Input::get('relate_id');
		$input = Input::except('_token', 'relate_id');
		$input['status'] = CommonProduct::getStatus($input);
		$relate['relate_id'] = Product::create($input)->id;
		$input['image_url'] = CommonProduct::uploadImage(PATH_PRODUCT.'/'.$relate['relate_id'], 'image_url');
		Product::find($relate['relate_id'])->update(['image_url' => $input['image_url']]);
		ProductRelate::create($relate);
		return Redirect::action('ProductController@index')->with('message', 'Tạo mới sản phẩm phụ thành công');
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
		$primary = ProductRelate::where('relate_id', $id)->first();
		if ($primary) {
			$primaryName = Product::find($primary->product_id);
			if ($primaryName) {
				$name = $primaryName->name;
				return View::make('admin.product_extra.show')->with(compact('product', 'name'));
			}
		}
		dd(11);
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
		$primary = ProductRelate::where('relate_id', $id)->first();
		// dd($primary);
		if ($primary) {
			$primaryName = Product::find($primary->product_id)->name;
			// dd($primaryName);
			if ($primaryName) {
				return View::make('admin.product_extra.edit')->with(compact('product', 'primaryName', 'primary'));
			}
		}
		dd(11);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$productId = Input::get('product_id');
		$input = Input::except('_token', '_method', 'primary_name', 'product_id');
		Product::find($id)->update($input);
		ProductRelate::where('relate_id', $id)->update(['product_id' => $productId]);
		return Redirect::action('ProductExtraController@index')->with('message', 'update thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::find($id)->delete();
		ProductRelate::where('relate_id', $id)->delete();
		return Redirect::action('ProductExtraController@index')->with('message', 'Xoá thành công');
	}


}
