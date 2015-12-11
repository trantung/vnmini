<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductCategoryTableSeeder extends Seeder {

	public function run()
	{
		ProductCategory::truncate();

		$data = [
			[
			"product_id" => 1,
			"category_id" => 1,
			"weight_number" => 1,
			],
			[
			"product_id" => 2,
			"category_id" => 2,
			"weight_number" => 1,
			],
			[
			"product_id" => 3,
			"category_id" => 3,
			"weight_number" => 1,
			],
			[
			"product_id" => 4,
			"category_id" => 4,
			"weight_number" => 1,
			],
			[
			"product_id" => 5,
			"category_id" => 5,
			"weight_number" => 1,
			],
		];

		ProductCategory::insert($data);
	}

}