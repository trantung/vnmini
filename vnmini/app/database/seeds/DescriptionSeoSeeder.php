<?php

class DescriptionSeoSeeder extends Seeder {

	public function run()
	{
		DescriptionSeo::create([
			'description' => 'đây là description seo của website vnmini.net',
			'keyword' => 'trang sức phong thuỷ, trang sức đá quý'
			]);
	}

}