<?php

class DiscountTableSeeder extends Seeder {

	public function run()
	{
		Discount::create(['percentage' => 10]);
	}

}