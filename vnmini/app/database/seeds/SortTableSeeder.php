<?php

class SortTableSeeder extends Seeder {

	public function run()
	{
		Sort::create([
					'name' => 'Trang sức phong thuỷ',
					'name_seo' => 'trang-suc-phong-thuy',
					'weight_number' => 1,
			]);
		Sort::create([
					'name' => 'Phụ kiện thời trang',
					'name_seo' => 'phu-kien-thoi-trang',
					'weight_number' => 2,
			]);
		Sort::create([
					'name' => 'Khuyến mãi',
					'name_seo' => 'khuyen-mai',
					'weight_number' => 3,
			]);
	}

}