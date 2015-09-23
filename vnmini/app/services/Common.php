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

	public static function create($input)
	{
		$name = self::commonName();
		$id = $name::firstOrCreate($input)->id;
		return $id;
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
		if ($name == 'sort') {
			return 'Sort';		
		}
	}

	public static function deleteRelate($list, $modelName)
	{
		foreach ($list as $key => $value) {
			$modelName::find($value->id)->delete();
		}
	}
}