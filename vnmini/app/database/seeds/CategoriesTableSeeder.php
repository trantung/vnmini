<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 3) as $index)
		{
			Category::create([
				'name'=>"Category".$index,
				'status' => 1,
				'sort_id' => $index
			]);
		}
	}

}