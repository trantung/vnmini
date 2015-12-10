<?php

class PromotionTableSeeder extends Seeder {

	public function run()
	{
		Promotion::create([
					'title' => 'Thông tin khuyến mãi',
					'description' => 'Giảm giá 10% cho khi mua từ 2 sản phẩm trở lên(trừ các sản phẩm trong chương trình khuyến mãi)',
			]);
	}

}