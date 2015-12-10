<?php
class CommonSort 
{
	public static function getCategoryId($id){
		$category_ids = array();
		$category_ids[] = $id;
		$sort = Category::find($id);
		$categories = $sort->categories;
		if($categories) {
			foreach ($categories as $category) {
				$category_ids[] = (int)$category->id;
			}
		}
		return $category_ids;
	}
}