<?php
use Symfony\Component\HttpFoundation\File\UploadedFile;
class ShopController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shop = Shop::first();
		return View::make('admin.shop.index')->with(compact('shop'));
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
		$input = Input::except('_method', '_token');
		if (Input::file('image_url')) {
			$rule = CommonProduct::validateImage($input);
			$validator = Validator::make($input, $rule);
			if ($validator->fails()) {
	            return Redirect::route('admin.shop.index')
	                ->withInput($input)
	                ->withErrors($validator);
	        }
			$shop = new Shop;
	        $input['image_url'] = CommonProduct::uploadImage($input, PATH_SHOP);
			Common::update($id, $input);
			return Redirect::route('admin.shop.index')->with('message', 'Update thành công');
		}
		else {
			Common::update($id, Input::except('_method', '_token', 'image_url'));
			return Redirect::route('admin.shop.index')->with('message', 'Update thành công');
		}
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// $shop = Shop::findOrFail($id);
		// $shop->delete();
	}


}
