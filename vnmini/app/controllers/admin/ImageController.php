<?php

class ImageController extends AdminController {

	public function delete($id)
	{
		AdminImage::find($id)->delete();
	}


}
