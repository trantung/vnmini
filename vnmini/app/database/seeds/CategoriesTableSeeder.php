<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		Category::truncate();

		$data = [

			[
				'name'=>'TRANG SÚC Phong thuy',
				'parent_id'=>NULL,
				'name_seo'=>'trang-suc-phong-thuy',
				'status'=>1,
				'weight_number' => 1,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NAM',
				'parent_id'=>1,
				'name_seo'=>'trang-suc-nam',
				'status'=>1,
				'weight_number' => 2,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'TRANG SÚC NƯ',
				'parent_id'=>1,
				'name_seo'=>'trang-suc-nu',
				'status'=>1,
				'weight_number' => 3,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN',
				'parent_id'=>NULL,
				'name_seo'=>'phu-kien-nam',
				'status'=>1,
				'weight_number' => 4,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN NƯ',
				'parent_id'=>4,
				'name_seo'=>'phu-kien-nu',
				'status'=>1,
				'weight_number' => 5,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'PHỤ KIÊN THOI TRANG',
				'parent_id'=>4,
				'name_seo'=>'phu-kien-thoi-trang',
				'status'=>1,
				'weight_number' => 6,
				'created_at'=>date('Y-m-d:H-i-s'),
			],
			[
				'name'=>'KHUYẾN MÃI',
				'parent_id'=>NULL,
				'name_seo'=>'khuyen-mai',
				'status'=>1,
				'weight_number' => 7,
				'created_at'=>date('Y-m-d:H-i-s'),
			],

		];

		Category::insert($data);
	}

}