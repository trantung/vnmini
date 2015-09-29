<?php

class ShopTableSeeder extends Seeder {

	public function run()
	{
		Shop::create(['user_id' => 1,
					'name' => 'shop',
					'description'=>'description',
					'image_url'=>'shop_stone.jpg',
					'lat' => 21.00296184,
					'long' => 105.85202157,
					'address' => 'Ha Noi',
					'contact' => 'Anh Hùng',
					'tel' => '0949998587',
					'mobile' => '0949998587',
			]);
	}

}