<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		foreach(range(1, 10) as $index)
		{
			Product::create([
				'category_id'	=>rand(1, 10),
				'code'			=>'code'.$index,
				'name'			=>'product'.$index,
				'size'			=>rand(5, 15)+$index,
				'material'		=>'material'.$index,
				'quantity'		=>$index,
				'origin_price'	=>rand(1,5)*1000,
				'new_price'		=>rand(1,5)*1000,
				'description'	=>'this is description for Product'.$index,
				'introduce'		=>'this is introduce for Product'.$index,
				'information'	=>'this is information for Product'.$index,
				'status'		=>rand(0, 1),
			]);
		}
	}

}