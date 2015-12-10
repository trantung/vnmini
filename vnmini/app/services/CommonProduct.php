<?php
use Carbon\Carbon;
class CommonProduct
{
	public static function getStatus($input)
	{
		if ($input['new_price'] != '') {
			return 1;
		}
		return 0;
	}

	public static function search($searchInput)
	{
		$products = Product::where(function ($query) use ($searchInput) {
			if (isset($searchInput['category_id'])) {
				$query->where('category_id', $searchInput['category_id']);
			}
			if (strlen($searchInput['name'])) {
				$query->where('name', 'LIKE', '%'.$searchInput['name'].'%');
			}
			if (strlen(isset($searchInput['code']))) {
				$query->where('code', 'LIKE', '%'.$searchInput['code'].'%');
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE_PRODUCT);
		return $products;
	}

	public static function validateImage($input)
	{
		$maxSize = MAX_SIZE_IMAGE;
		$mimeTypes = MIME_TYPES;
		if ($input['image_url']) {
			$input['file_extension'] = strtolower(Input::file('image_url')->getClientOriginalExtension());
		}
		$imageRule = [			
			'image_url' => "image|max:$maxSize",
			'file_extension' => "$mimeTypes",
			];
		return $imageRule;
	}

	public static function validate($input)
	{
		$rule = [
			'type_id' => 'required',
			'name' => 'required',
			'name_seo' => 'required',
			'code' => 'required',
			'quantity' => 'required|integer|min:0',
			'origin_price' => 'required|integer|min:1000|'.'greater_than:new_price,' . $input['new_price'],
			'new_price' => 'integer|min:0',
			];
		$imageRule = self::validateImage($input);
		$rule = array_merge($rule, $imageRule);
		$message = [
			'type_id.required' => 'Phải chọn loại sản phẩm',
			'name.required' => 'Tên sản phẩm phải có',
			'code.required' => 'Mã sản phẩm phải có',
			'quantity.required' => 'Số lượng sản phẩm phải có',
			'quantity.integer' => 'Số lượng sản phẩm phải là số nguyên',
			'quantity.min' => 'Số lượng sản phẩm phải lớn hơn 0',
			'origin_price.required' => 'Giá gốc phải có',
			'origin_price.integer' => 'Giá gốc phải là số nguyên',
			'origin_price.min' => 'Giá gốc phải lớn hơn 1000',
			'new_price.integer' => 'Giá khuyến mãi phải là số nguyên',
			'new_price.min' => 'Giá khuyến mãi phải lớn hơn 1000',
			'origin_price.greater_than' => 'Giá gốc phải lớn hơn giá khuyến mãi',
			'image_url.image' => 'Ảnh sản phẩm phải đúng định dạng',
			'image_url.max' => 'Ảnh sản phẩm có dung lượng lớn nhất là ',
			];
		return Validator::make($input, $rule, $message);
	}
	
	public static function createImageRelate($input, $productId)
	{
		$imageRelateId = [];
		foreach ($input['image_relate'] as $key => $value) {
			if ($value) {
				$path = PATH_PRODUCT;
				$destinationPath = public_path().$path.'/'.$productId;
				$filename = $value->getClientOriginalName();
				$uploadSuccess   =  $value->move($destinationPath, $filename);
				$adminImage['product_id'] = $productId;
				$adminImage['image_url'] = PATH_PRODUCT.'/'.$productId.'/'.$filename;
				$imageRelateId[] = AdminImage::firstOrCreate($adminImage)->id;
			}
		}
		return $imageRelateId;
	}

	public static function uploadImage($path, $field)
	{
		$destinationPath = public_path().$path;
		$filename = 'nothumnail.jpg';
		if(Input::hasFile($field)){
			$file = Input::file($field);
			$filename = $file->getClientOriginalName();
			$uploadSuccess   =  $file->move($destinationPath, $filename);
			return $path.'/'.$filename;
		}
		return "";
	}

	public static function updateRelateImage($input, $productId)
	{
		foreach ($input['image'] as $key => $value) {
			if ($value) {
				$path = PATH_PRODUCT;
				$destinationPath = public_path().$path.'/'.$productId;
				$filename = $value->getClientOriginalName();
				$uploadSuccess   =  $value->move($destinationPath, $filename);
				$adminImage['product_id'] = $productId;
				$adminImage['image_url'] = $path.'/'.$productId.'/'.$filename;
				AdminImage::find($key)->update($adminImage);
			}
		}
	}

	public static function getAllProduct(array $category_ids, $paginate = FRONTEND_PAGINATE_PRODUCT){
        	return Product::join("product_categories", "products.id","=", "product_categories.product_id")
				->join("categories", "product_categories.category_id","=", "categories.id")
				->select("products.*", "categories.name as category_name", "product_categories.weight_number")
				->orderBy('product_categories.weight_number', 'ASC')
    			->distinct("products.id")->paginate($paginate);
		
    }

    public static function getRelateProduct(Product $product){
    	return $product->relates()->paginate(FRONTEND_PAGINATE_PRODUCT_RELATE);
    }

    public static function getNameSeo($name){
    	$lowerName = mb_strtolower($name);
    	$nameSeo = str_replace(' ', '-', $lowerName);
    	
    	return $nameSeo;
    }

    public static function getImageUrl($input, $id)
    {
    	if($input['image_url']) {
    		$image_url = self::uploadImage($input, PATH_PRODUCT.'/'.$id);
    	}
    	else {
    		$image_url = Product::find($id)->image_url;
    	}
    	return $image_url;
    }
    public static function getBigImageUrl($input, $id)
    {
    	if($input['big_image_url']) {
    		$image_url = self::uploadImage($input, PATH_PRODUCT.'/'.$id, 1);
    	}
    	else {
    		$image_url = Product::find($id)->big_image_url;
    	}
    	return $image_url;
    }
    public static function getCategoryProduct($id)
	{
		$product = Product::find($id);
		$listCategory = $product->categories->lists('id', 'name');
		return $listCategory;
	}

	public static function getProductRelate(Product $product){

		$arrId = [];
		if(!$product->relates->isEmpty()){

			foreach ($product->relates as $relate) {
				
				$arrId[] = $relate->relate_id;

			}

			return Product::whereIn('id', $arrId)->get();
		}
		dd($product->relates);

	}
}