<?php

class ProductController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = ProductRelate::lists('relate_id');
		$id = Product::lists('id');
		$result = array_diff($id, $input);
		$products = Product::whereIn('id', $result)->orderBy('id', 'desc')->paginate(PAGINATE_PRODUCT);
		$categories = Category::all(['id', 'name']);
		$total = $products->getTotal();
		return View::make('admin.products.index')->with(compact('products', 'categories', 'total'));
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
		$weightNumber = Input::get('weight_number');
		$input = Input::except('_token', 'image_relate', 'category_id', 'relate_id', 'primary_name', 'weight_number');
		$validator = CommonProduct::validate($input);
		if ($validator->fails()) {
            return Redirect::route('admin.products.create')
                ->withInput($input)
                ->withErrors($validator);
        }
		$productId = Common::create($input);
		$product = Product::find($productId);
		$product->categories()->attach(Input::get('category_id'));
		ProductCategory::where('product_id', $productId)->update(['weight_number' => $weightNumber]);
        $input['image_url'] = CommonProduct::uploadImage(PATH_PRODUCT.'/'.$productId, 'image_url');

        // $input['big_image_url'] = CommonProduct::uploadImage(PATH_PRODUCT.'/'.$productId, 'big_image_url');
		Common::update($productId, ['image_url' => $input['image_url']]);
		$input['status'] = CommonProduct::getStatus($input);
		if (!$productId) {
			return Redirect::route('admin.products.index')->with('message', 'Tạo mới thất bại');
		}
		if (Input::get('image_relate')) {
			CommonProduct::createImageRelate(Input::only('image_relate'), $productId);
		}
		// if (Input::get('relate_id')) {
		// 	ProductRelate::create(['product_id' => Input::get('relate_id'), 'relate_id' => $productId]);
		// }
		
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
		$number = ProductCategory::where('product_id', $id)->first();
		if ($number) {
			$weightNumber = $number->weight_number;
		}
		else{
			$weightNumber = null;
		}
		$productRelates = ProductRelate::where('product_id', $id)->lists('relate_id');
		return View::make('admin.products.show')->with(compact('product', 'imageRelates', 'productRelates', 'weightNumber'));
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
		$productRelates = ProductRelate::where('product_id', $id)->lists('relate_id');
		$number = ProductCategory::where('product_id', $id)->first();
		if ($number) {
			$weightNumber = $number->weight_number;
		}
		else{
			$weightNumber = null;
		}
		$imageRelates = $product->images;
		return View::make('admin.products.edit')->with(compact('product', 'imageRelates', 'productRelates', 'weightNumber'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$weightNumber = Input::get('weight_number');
		$input = Input::except('_token','image', 'image_relate', 'category_id','relate_id', 'weight_number');
		$validator = CommonProduct::validate($input);
		if ($validator->fails()) {
            return Redirect::route('admin.products.edit', $id)
                ->withInput($input)
                ->withErrors($validator);
        }
        if (Input::only('image_relate')) {
			CommonProduct::createImageRelate(Input::only('image_relate'), $id);
        }
        if(!empty($input['image_url'])){
        	$input['image_url'] = CommonProduct::uploadImage(PATH_PRODUCT.'/'.$id, 'image_url');
        }else{
			$input['image_url'] = CommonProduct::getImageUrl($input, $id);
        }
   //      if(!empty($input['big_image_url'])){
   //      	$input['big_image_url'] = CommonProduct::uploadImage(PATH_PRODUCT.'/'.$id, 'big_image_url');
   //      }else{
			// $input['big_image_url'] = CommonProduct::getBigImageUrl($input, $id);
   //      }
		$input['status'] = CommonProduct::getStatus($input);
		Common::update($id, $input);
		$product = Product::find($id);
		$product->categories()->sync(Input::get('category_id'));
		ProductCategory::where('product_id', $id)->update(['weight_number' => $weightNumber]);
		if(Input::get('relate_id')){
			ProductRelate::where('relate_id', $id)->first()->update(['product_id' => Input::get('relate_id')]);
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
		$orders = $product->orders;
		if (!empty($orders->toArray())) {
			return Redirect::route('admin.products.show', $id)->with('message', 'Không thế xoá sản phẩm đã có trong hoá đơn');
		}
		if (!empty($product->images->toArray())) {
			Common::deleteRelate($imageRelates, 'AdminImage');
		}
		$product = Product::find($id);
		$product->categories()->detach();
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

	public function ajaxListProducts(){
		$input = Input::all();
		$name = '%'.$input["keyword"].'%';
		$products = Product::where('name', 'LIKE', $name)->get();
		$li = "";
		if(!$products->isEmpty()){
			foreach ($products as $product) {
				$li .= '<li class="list-group-item" onclick="set_item(\''.str_replace("'", "\'", $product->name).'\', \''.str_replace("'", "\'", $product->id).'\')">'.$product->name.'</li>';
			}
		}
		return $li;
	}

	public function updateIndexData()
	{
		$ids = Input::get('id');
		$weightNumber = Input::get('weight_number');
		foreach($ids as $key => $value) {
			ProductCategory::where('product_id', $value)->update(['weight_number' => $weightNumber[$key]]);
		}
		dd(1);
	}

}
