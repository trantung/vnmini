<?php
use Carbon\Carbon;
class Common 
{
	public static function delete($id)
	{
		$name = self::commonName();
		$name::find($id)->delete();
	}

	public static function update($id, $input)
	{
		$name = self::commonName();
		$name::find($id)->update($input);
	}

	public static function create($input, $name = NULL)
	{
		$name = self::commonName($name);
		$id = $name::create($input)->id;
		return $id;
	}

	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == 'category') {
			return 'Category';
		}
		if ($name == 'products') {
			return 'Product';		
		}
		if ($name == 'sort') {
			return 'Sort';		
		}
		if ($name == 'image') {
			return 'AdminImage';		
		}
		if ($name == 'discount') {
			return 'Discount';
		}
		if ($name == 'bannerimage') {
			return 'BannerImage';
		}
		if ($name == 'bannerslide') {
			return 'BannerSlider';
		}
		if ($name == 'new') {
			return 'AdminNew';
		}
		if ($name == 'comment') {
			return 'Comment';
		}
		if ($name == 'order') {
			return 'Order';
		}
		if ($name == 'shop') {
			return 'Shop';
		}
		if ($name == 'promotion') {
			return 'Promotion';
		}
		if ($name == 'user') {
			return 'User';
		}
		if ($name == 'orderProduct') {
			return 'OrderProduct';
		}
		if ($name == 'customer') {
			return 'Customer';
		}
		if ($name == 'descriptionseo') {
			return 'DescriptionSeo';
		}
		if ($name == 'footer') {
			return 'Footer';
		}
	}

	public static function deleteRelate($list, $modelName)
	{
		foreach ($list as $key => $value) {
			$modelName::find($value->id)->delete();
		}
	}
}