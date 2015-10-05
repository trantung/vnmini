<?php

class DescriptionSeoSeeder extends Seeder {

	public function run()
	{
		DescriptionSeo::create(['description' => 'đây là description seo của website vnmini.net']);
	}

}