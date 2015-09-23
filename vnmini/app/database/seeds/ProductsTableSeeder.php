<?php

use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		foreach(range(1, 3) as $index)
		{
			Product::create([
				'category_id'	=>rand(1, 3),
				'code'			=>'code'.$index,
				'name'			=>'product'.$index,
				'size'			=>rand(5, 15)+$index,
				'material'		=>'material'.$index,
				'quantity'		=>$index,
				'origin_price'	=>rand(10,15)*1000,
				'new_price'		=>rand(1,5)*1000,
				'description'	=>'this is description for Product'.$index,
				'introduce'		=>'this is introduce for Product'.$index,
				'information'	=>'this is information for Product'.$index,
				'status'		=>1,
			]);
		}
	}

}