<?php

class FrontendController extends BaseController {

	public function __construct(){
		$sorts = Sort::all();
		$partner_slider = array();
		$galary_slider = [];
		$sliders = BannerSlider::all();
		$info = Footer::findOrfail(1);
		$bannerText = BannerImage::all()->toArray();
		$des = DescriptionSeo::findOrfail(1);
		foreach ($sliders as $slider) {
			if($slider->position == SLIDE){
				$galary_slider[] = $slider;
			}
			elseif($slider->position == PARTNER){
				$partner_slider[] = $slider;
			}
		}
		View::share('info', $info);
		View::share('sorts',$sorts);
		View::share('galary_slider',$galary_slider);
		View::share('partner_slider',$partner_slider);
		View::share('bannerText',$bannerText);
		View::share('des',$des);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
	}


}
