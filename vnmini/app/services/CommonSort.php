<?php
class CommonSort 
{
	public static function getCategoryId(Sort $sort){
		$category_ids = array();
		$categories = $sort->categories;
		foreach ($categories as $category) {
			$category_ids[] = (int)$category->id;
		}

		return $category_ids;
	}
}