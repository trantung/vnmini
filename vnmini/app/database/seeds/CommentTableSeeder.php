<?php

class CommentTableSeeder extends Seeder {

	public function run()
	{
		Comment::create([
					'product_id' => 1,
					'content' => 'des1',
					'email' => 'test1@gmail.com',
					'name' => 'name1',
					'status' => 0
			]);
		Comment::create([
					'product_id' => 2,
					'content' => 'des2',
					'email' => 'test2@gmail.com',
					'name' => 'name2',
					'status' => 1
			]);
		Comment::create([
					'product_id' => 3,
					'content' => 'des3',
					'email' => 'test2@gmail.com',
					'name' => 'name3',
					'status' => 0
			]);
	}

}