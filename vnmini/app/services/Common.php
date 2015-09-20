<?php
use Carbon\Carbon;
class Common 
{
	public static function delete($id)
	{
		$name = Request::segment(2);
		if ($name == 'category') {
			Category::find($id)->delete();
		}
		if ($name == 'bannerimage') {
			BannerImage::find($id)->delete();
		}
		//
	}

	public static function update($id, $input)
	{
		$name = Request::segment(2);
		if ($name == 'category') {
			Category::find($id)->update($input);
		}
		//
	}

	public static function create($input)
	{
		$name = self::commonName();
		$name::firstOrCreate($input);
	}

	public static function commonName()
	{
		$name = Request::segment(2);
		if ($name == 'category') {
			return 'Category';
		}
		if ($name == 'products') {
			return 'Product';		
		}
	}
}