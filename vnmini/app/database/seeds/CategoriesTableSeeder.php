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
				'name_seo'=>'trang-suc-theo-menh',
				'status'=>1,
				'sort_id'=>1,
				'weight_number' => 1,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NAM',
				'name_seo'=>'trang-suc-name',
				'status'=>1,
				'sort_id'=>1,
				'weight_number' => 2,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NƯ',
				'name_seo'=>'trang-suc-nu',
				'status'=>1,
				'sort_id'=>1,
				'weight_number' => 3,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN NAM',
				'name_seo'=>'phu-kien-nam',
				'status'=>1,
				'sort_id'=>2,
				'weight_number' => 4,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN NƯ',
				'name_seo'=>'phu-kien-nu',
				'status'=>1,
				'sort_id'=>2,
				'weight_number' => 5,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN THOI TRANG',
				'name_seo'=>'phu-kien-thoi-trang',
				'status'=>1,
				'sort_id'=>2,
				'weight_number' => 6,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'KHUYẾN MÃI',
				'name_seo'=>'khuyen-mai',
				'status'=>1,
				'sort_id'=>3,
				'weight_number' => 7,
				'created_at'=>date('Y-m-d:H-i-s'),
			],

		];

		Category::insert($data);
	}

}