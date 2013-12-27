<?php

class ReportsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('reports')->truncate();

		$reports[] = array(
			'text' => 'Awesome report',
			'task_id' => '1',
			'employer_id' => '3',
			'time_start' => '2013-12-08 10:00:00',
			'time_end' => '2013-12-08 19:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report two',
			'task_id' => '1',
			'employer_id' => '3',
			'time_start' => '2013-12-07 12:00:00',
			'time_end' => '2013-12-07 18:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report three',
			'task_id' => '1',
			'employer_id' => '3',
			'time_start' => '2013-12-15 16:00:00',
			'time_end' => '2013-12-15 18:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report 4',
			'task_id' => '2',
			'employer_id' => '2',
			'time_start' => '2013-12-12 10:00:00',
			'time_end' => '2013-12-12 18:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report 5',
			'task_id' => '2',
			'employer_id' => '2',
			'time_start' => '2013-12-16 10:00:00',
			'time_end' => '2013-12-16 18:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report 6',
			'task_id' => '2',
			'employer_id' => '2',
			'time_start' => '2013-12-18 15:00:00',
			'time_end' => '2013-12-18 18:00:00',
		);

		$reports[] = array(
			'text' => 'Awesome report 7',
			'task_id' => '3',
			'employer_id' => '4',
			'time_start' => '2013-12-20 12:00:00',
			'time_end' => '2013-12-20 18:00:00',
		);

		// Uncomment the below to run the seeder
		DB::table('reports')->insert($reports);
	}

}
