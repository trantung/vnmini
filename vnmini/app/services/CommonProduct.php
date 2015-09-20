<?php
use Carbon\Carbon;
class CommonProduct
{
	public static function getStatus($input)
	{
		if ($input['new_price']) {
			return 1;
		}
		return 0;
	}

	public static function search($searchInput)
	{
		$products = Product::where(function ($query) use ($searchInput) {
			if ($searchInput['category_id']) {
				$query->where('category_id', $searchInput['category_id']);
			}
			if (strlen($searchInput['name'])) {
                $query->where('name', 'LIKE', '%'.$searchInput['name'].'%');
			}
			if (strlen($searchInput['code'])) {
                $query->where('code', 'LIKE', '%'.$searchInput['code'].'%');
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE_PRODUCT);
		return $products;
	}
}