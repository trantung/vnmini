<?php

class ShopTableSeeder extends Seeder {

	public function run()
	{
		Shop::create(['user_id' => 1,
					'name' => 'shop',
					'description'=>'description',
					'image_url'=>'img/shops/shop_stone.jpg',
			]);
	}

}