<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projects')->truncate();

		$projects[] = array(
			'name' => 'Awesome project',
			'date_start' => '2013-12-04 12:00',
			'date_end' => '2013-12-15 12:00',
		);

		// Uncomment the below to run the seeder
		DB::table('projects')->insert($projects);
	}

}
