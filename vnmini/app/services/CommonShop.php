<?php
use Carbon\Carbon;
class CommonShop
{
	public static function uploadLogo($input, $path)
	{
		$destinationPath = public_path().$path;
		$filename = 'nothumnail.jpg';
		if(Input::hasFile('logo')){
			$file = Input::file('logo');
			$filename = $file->getClientOriginalName();
			$uploadSuccess   =  $file->move($destinationPath, $filename);
		}
		return $path.'/'.$filename;
	}
}