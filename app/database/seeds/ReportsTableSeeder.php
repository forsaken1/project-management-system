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

		// Uncomment the below to run the seeder
		DB::table('reports')->insert($reports);
	}

}
