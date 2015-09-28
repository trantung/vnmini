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
		$data = (Input::except('_method'));
		$shop = Shop::findOrFail($id);
		$shop->name=trim($data['name']);
		$shop->description=trim($data['description']);
		$shop->address=trim($data['address']);
		$shop->contact=trim($data['contact']);
		$shop->tel=trim($data['tel']);
		$shop->mobile=trim($data['mobile']);
		$shop->lat=trim($data['lat']);
		$shop->long=trim($data['long']);
		// dd($data);
		if(Input::hasFile('image')){
		    $destinationPath = public_path().'/img/shops/';
		    $name = Input::file('image')->getClientOriginalName();
		    Input::file('image')->move($destinationPath, $name);
		    $extends = Input::file('image')->getClientOriginalExtension();
		    $ex = array('jpg', 'png', 'jpeg', 'gif');
		    if(in_array(strtolower($extends),$ex)){
		    	$shop->image_url = '/img/shops/'.Input::file('image')->getClientOriginalName();
		    }else{
		    	return Redirect::route('admin.shop.index')->with('message', 'Định dạng ảnh không đúng');
		    }
			$shop->image_url='/img/shops/'.Input::file('image')->getClientOriginalName();
		}
		$shop->save();
		return Redirect::route('admin.shop.index')->with('message', 'Update thành công');
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
