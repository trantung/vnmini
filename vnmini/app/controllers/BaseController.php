<?php

class BaseController extends Controller {

	public function __construct(){
		$sorts = Sort::all(['name', 'id']);
		$partner_slider = array();
		$galary_slider = [];
		$sliders = BannerSlider::all();
		$info = Shop::findOrfail(1);
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
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
