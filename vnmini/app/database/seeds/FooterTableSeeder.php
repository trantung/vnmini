<?php

class FooterTableSeeder extends Seeder {

	public function run()
	{
		Footer::create([
					'contact' => 'Anh Hung',
					'address'=>'Ha Noi',
					'hotline' => '0949998587',
					'email' => 'vnmini18@gmail.com',
			]);
	}

}