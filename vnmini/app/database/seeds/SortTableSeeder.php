<?php

class SortTableSeeder extends Seeder {

	public function run()
	{
		Sort::create([
					'name' => 'Trang sức phong thuỷ',
			]);
		Sort::create([
					'name' => 'Phụ kiện thời trang',
			]);
		Sort::create([
					'name' => 'Khuyến mãi',
			]);
	}

}