<?php

class SliderImageTableSeeder extends Seeder {

	public function run()
	{
		
		BannerSlider::truncate();
			$data=[

				[
					'image_url'=>'img/slide/slide1.png',
					'position'=>0
				],
				[
					'image_url'=>'img/slide/slide1.png',
					'position'=>0
				],
				[
					'image_url'=>'img/slide/slide1.png',
					'position'=>0
				],
				[
					'image_url'=>'img/slide/slide1.png',
					'position'=>0
				],
				[
					'image_url'=>'img/partner_slick/slick-1.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-2.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-3.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-4.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-5.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-6.png',
					'position'=>1
				],
				[
					'image_url'=>'img/partner_slick/slick-7.png',
					'position'=>1
				],

			];
		BannerSlider::insert($data);
	}

}