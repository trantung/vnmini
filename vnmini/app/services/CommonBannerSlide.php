<?php
use Carbon\Carbon;
class CommonBannerSlide
{
	public static function getPosition()
	{
		return [0 => 'VN Stone', 1 => 'Đối tác'];
	}

	public static function search($input)
	{
		$results = BannerSlider::where('position', $input)->get();
		return $results;
	}
}