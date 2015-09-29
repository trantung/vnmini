<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		Category::truncate();

		$data = [

			[
				'name'=>'TRANG SÚC THEO MÊNH',
				'status'=>1,
				'sort_id'=>1,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NAM',
				'status'=>1,
				'sort_id'=>1,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NƯ',
				'status'=>1,
				'sort_id'=>1,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN NAM',
				'status'=>1,
				'sort_id'=>2,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN NƯ',
				'status'=>1,
				'sort_id'=>2,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN THOI TRANG',
				'status'=>1,
				'sort_id'=>3,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SƯC PHONG THỦY',
				'status'=>1,
				'sort_id'=>3,
				'created_at'=>date('Y-m-d:H-i-s'),
			],

		];

		Category::insert($data);
	}

}