<?php

class EmployeeTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('employees')->truncate();

		$employee[] = array(
			'user_id' => '2',
			'project_id' => '1',
			'role' => '1',
			'name' => 'Шувалов Борис',
		);

		$employee[] = array(
			'user_id' => '3',
			'project_id' => '1',
			'role' => '2',
			'name' => 'Сергей Петров',
		);

		$employee[] = array(
			'user_id' => '4',
			'project_id' => '1',
			'role' => '1',
			'name' => 'Александр Пушкин',
		);

		$employee[] = array(
			'user_id' => '5',
			'project_id' => '1',
			'role' => '1',
			'name' => 'Владимир Ленин',
		);

		// Uncomment the below to run the seeder
		DB::table('employees')->insert($employee);
	}

}
