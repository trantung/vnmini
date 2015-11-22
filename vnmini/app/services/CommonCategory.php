<?php
class CommonCategory
{
	public static function getCategories()
	{
		$categories = Category::orderBy('id', 'asc');
		$categories = $categories->lists('name', 'id');
		return $categories;
	}

	public static function getSortCategory()
	{
		$sort = Sort::orderBy('id', 'asc');
		$sort = $sort->lists('name', 'id');
		return $sort;
	}

	public static function getProduct(Category $category){
		return $category->products()->paginate(FRONTEND_PAGINATE_PRODUCT);
	}

	public static function getTypeProduct()
	{
		return Type::lists('name', 'id');
	}
}