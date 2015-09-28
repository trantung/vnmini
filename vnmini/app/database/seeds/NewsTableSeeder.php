<?php

class NewsTableSeeder extends Seeder {

	public function run()
	{
		AdminNew::create([
					'user_id'=>1,
					'title' => 'test this news',
					'description'=>'this is description',
					'image_url' => 'img/news/news.jpg',
			]);
	}

}