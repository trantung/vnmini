<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SortTableSeeder');
		$this->call('TypeTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('ShopTableSeeder');
		$this->call('DiscountTableSeeder');
		$this->call('BannerImageTableSeeder');
		$this->call('SliderImageTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('CommentTableSeeder');
		$this->call('PromotionTableSeeder');
		$this->call('DescriptionSeoSeeder');
		$this->call('FooterTableSeeder');
	}
}
