<?php

class BannerImageTableSeeder extends Seeder {

	public function run()
	{
		BannerImage::create([
					'title' => 'title1',
					'description' => 'des1',
					'position' => 0
			]);
		BannerImage::create([
					'title' => 'title2',
					'description' => 'des2',
					'position' => 1
			]);
		BannerImage::create([
					'title' => 'title3',
					'description' => 'des3',
					'position' => 2
			]);
	}

}