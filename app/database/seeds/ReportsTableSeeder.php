<?php

class ReportsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('reports')->truncate();

		$reports = array(
			'text' => 'Awesome report',
			'task_id' => '1',
			'employer_id' => '3',
		);

		// Uncomment the below to run the seeder
		DB::table('reports')->insert($reports);
	}

}
