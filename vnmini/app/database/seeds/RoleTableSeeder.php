<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
					'name' => 'Admin',
			]);
		Role::create([
					'name' => 'Manager',
			]);
	}

}