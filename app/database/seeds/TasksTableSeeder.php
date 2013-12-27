<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('tasks')->truncate();

		$tasks[] = array(
			'priority' => '1',
			'status' => '1',
			'work_time' => '10',
			'stage_id' => '1',
			'employer_id' => '3',
			'project_id' => '1',
			'name' => 'Awesome task one',
		);

		$tasks[] = array(
			'priority' => '1',
			'status' => '1',
			'work_time' => '18',
			'stage_id' => '1',
			'employer_id' => '2',
			'project_id' => '1',
			'name' => 'Awesome task two',
		);

		$tasks[] = array(
			'priority' => '1',
			'status' => '1',
			'work_time' => '8',
			'stage_id' => '1',
			'employer_id' => '4',
			'project_id' => '1',
			'name' => 'Awesome task three',
		);

		// Uncomment the below to run the seeder
		DB::table('tasks')->insert($tasks);
	}

}
