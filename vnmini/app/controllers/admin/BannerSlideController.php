<?php

class BannerSlideController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bannerSlides = BannerSlider::all();
		return View::make('admin.banner_slider.index')->with(compact('bannerSlides'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.banner_slider.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
        $input['image_url'] = CommonProduct::uploadImage($input, PATH_BANNER_SLIDE);
        $bannerSlideId = Common::create($input);
        if (!$bannerSlideId) {
			return Redirect::route('admin.bannerslide.index')->with('message', 'Tạo mới thất bại');
		}
		return Redirect::route('admin.bannerslide.index')->with('message', 'Tạo mới thành công');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bannerSlide = BannerSlider::findOrFail($id);
		return View::make('admin.banner_slider.show')->with(compact('bannerSlide'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

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
		return Redirect::route('admin.bannerslide.index')->with('message', 'Xoá thành công');
	}

	public function search()
	{
		$input = Input::all();
		if ($input['position'] == '') {
			return Redirect::route('admin.bannerslide.index');
		}
		$bannerSlides = CommonBannerSlide::search($input['position']); 
		return View::make('admin.banner_slider.index')->with(compact('bannerSlides'));
	}

}
