<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(['role_id' => 1,
					'name' => 'tung',
					'email'=>'trantunghn196@gmail.com',
					'password'=>Hash::make('123456'),
					'phone' => '0912957368',
					'status' => 0,
			]);
		User::create(['role_id' => 2,
					'name' => 'thai',
					'email'=>'thai@gmail.com',
                    'password'=>Hash::make('123456'),
                    'phone' => '0123456789',
                    'status' => 1,
			]);
	}

}