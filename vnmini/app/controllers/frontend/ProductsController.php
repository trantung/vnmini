<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of frontend.products
	 *
	 * @return Response
	 */
	public function index()
	{
		$sorts = Sort::all(['name', 'id']);
		return View::make('frontend.products.index', compact('sorts'));
	}

	/**
	 * Show the form for creating a new frontend.product
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend.products.create');
	}

	/**
	 * Store a newly created frontend.product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('frontend.products.index');
	}

	/**
	 * Display the specified frontend.product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		$product_relates = CommonProduct::getRelateProduct($product);
		return View::make('frontend.products.show', compact('product', 'product_relates'));
	}

	public function getProductBySort($id){
		$sort = Sort::findOrFail($id);
		return View::make('frontend.categories.show', compact('sort'));
	}
}
