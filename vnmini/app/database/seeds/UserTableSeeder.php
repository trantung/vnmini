<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(['role_id' => 1,
					'name' => 'tung',
					'email'=>'trantunghn196@gmail.com',
                    'password'=>Hash::make('123456'),
			]);
	}

}