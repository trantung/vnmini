<?php

class SortTableSeeder extends Seeder {

	public function run()
	{
		Sort::create([
					'name' => 'Trang sức phong thuỷ',
					'name_seo' => 'trang-suc-phong-thuy',
			]);
		Sort::create([
					'name' => 'Phụ kiện thời trang',
					'name_seo' => 'phu-kien-thoi-trang',
			]);
		Sort::create([
					'name' => 'Khuyến mãi',
					'name_seo' => 'khuyen-mai',
			]);
	}

}