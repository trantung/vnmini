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

	public static function validate($input)
	{
		$maxSize = MAX_SIZE_IMAGE;
		$mimeTypes = MIME_TYPES;
		$rule = [
			'category_id' => 'required',
			'name' => 'required',
			'code' => 'required',
			'quantity' => 'required|integer|min:0',
			'origin_price' => 'required|integer|min:1000|'.'greater_than:new_price,' . $input['new_price'],
			'new_price' => 'integer|min:0',
			];
		if ($input['image_url']) {
            $input['file_extension'] = strtolower(Input::file('image_url')->getClientOriginalExtension());
        }
        $imageRule = [			
        	'image_url' => "required|image|max:$maxSize",
            'file_extension' => "required_with:image_url|in:$mimeTypes",
            ];
        $rule = array_merge($rule, $imageRule);

		 
		$message = [
			'category_id.required' => 'Phải chọn loại sản phẩm',
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
			'image_url.required' => 'Ảnh sản phẩm phải có',
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
	            $adminImage['image_url'] = $filename;
	            $imageRelateId[] = AdminImage::firstOrCreate($adminImage)->id;
			}
		}
		return $imageRelateId;
	}

	public static function uploadImage($input, $path)
	{
		$destinationPath = public_path().$path;
        $filename = 'nothumnail.jpg';
        if(Input::hasFile('image_url')){
            $file = Input::file('image_url');
            $filename = $file->getClientOriginalName();
            $uploadSuccess   =  $file->move($destinationPath, $filename);
        }
        return $filename;
	}
}