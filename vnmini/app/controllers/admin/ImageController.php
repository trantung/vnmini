<?php

class ImageController extends AdminController {

	public function delete($id)
	{
		dd(12);
		$productId = AdminImage::find($id)->product->id;
		Common::delete($id);
		// return Redirect::route('admin.products.edit', $productId)->with('message', 'xoá ảnh liên quan thành công');		
	}


}
