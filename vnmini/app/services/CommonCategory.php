<?php
class CommonCategory
{
	public static function getCategories()
	{
		$categories = Category::orderBy('id', 'asc');
		$categories = $categories->lists('name', 'id');
		return $categories;
	}
}