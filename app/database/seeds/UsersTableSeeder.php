<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users[] = array(
			'username' => 'admin',
			'first_name' => '',
			'last_name' => '',
			'email' => 'admin@mail.ru',
			'password' => '$2y$08$xlxklsu9LbW.d2ti9gnzvO7pAmcgLVbFjcteSMHLWNsK34EuSFjcK',
			'confirmation_code' => '2ba227562e4528900a8caf4ca361ce20',
			'confirmed' => '1',
			'is_admin' => '1',
			'created_at' => '2013-12-03 13:04:09',
			'updated_at' => '2013-12-03 13:04:09',
		);

		$users[] = array(
			'username' => 'alexey',
			'first_name' => 'Алексей',
			'last_name' => 'Крылов',
			'email' => 'alexey@mail.ru',
			'password' => '$2y$08$xlxklsu9LbW.d2ti9gnzvO7pAmcgLVbFjcteSMHLWNsK34EuSFjcK',
			'confirmation_code' => '2ba227562e4528900a8caf4ca361ce20',
			'confirmed' => '1',
			'is_admin' => '0',
			'created_at' => '2013-12-03 13:04:09',
			'updated_at' => '2013-12-03 13:04:09',
		);

		$users[] = array(
			'username' => 'sergey',
			'first_name' => 'Сергей',
			'last_name' => 'Петров',
			'email' => 'sergey@mail.ru',
			'password' => '$2y$08$xlxklsu9LbW.d2ti9gnzvO7pAmcgLVbFjcteSMHLWNsK34EuSFjcK',
			'confirmation_code' => '2ba227562e4528900a8caf4ca361ce20',
			'confirmed' => '1',
			'is_admin' => '0',
			'created_at' => '2013-12-03 13:04:09',
			'updated_at' => '2013-12-03 13:04:09',
		);

		$users[] = array(
			'username' => 'alexander',
			'first_name' => 'Александр',
			'last_name' => 'Пушкин',
			'email' => 'alexander@mail.ru',
			'password' => '$2y$08$xlxklsu9LbW.d2ti9gnzvO7pAmcgLVbFjcteSMHLWNsK34EuSFjcK',
			'confirmation_code' => '2ba227562e4528900a8caf4ca361ce20',
			'confirmed' => '1',
			'is_admin' => '0',
			'created_at' => '2013-12-03 13:04:09',
			'updated_at' => '2013-12-03 13:04:09',
		);

		$users[] = array(
			'username' => 'vladimir',
			'first_name' => 'Владимир',
			'last_name' => 'Ленин',
			'email' => 'vladimir@mail.ru',
			'password' => '$2y$08$xlxklsu9LbW.d2ti9gnzvO7pAmcgLVbFjcteSMHLWNsK34EuSFjcK',
			'confirmation_code' => '2ba227562e4528900a8caf4ca361ce20',
			'confirmed' => '1',
			'is_admin' => '0',
			'created_at' => '2013-12-03 13:04:09',
			'updated_at' => '2013-12-03 13:04:09',
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
