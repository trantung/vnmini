<?php

class TypeTableSeeder extends Seeder {

	public function run()
	{
		Type::create([
					'name' => '8 ly',
			]);
		Type::create([
					'name' => '10 ly',
			]);
		Type::create([
					'name' => '12 ly',
			]);
		Type::create([
					'name' => '14 ly',
			]);
		Type::create([
					'name' => '16 ly',
			]);
		
	}

}