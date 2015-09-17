<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of frontend.products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return View::make('frontend.products.index', compact('frontend.products'));
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

		return View::make('frontend.products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified frontend.product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		return View::make('frontend.products.edit', compact('product'));
	}

	/**
	 * Update the specified frontend.product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('frontend.products.index');
	}

	/**
	 * Remove the specified frontend.product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return Redirect::route('frontend.products.index');
	}

}
