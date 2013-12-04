<?php

class StagesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stages')->truncate();

		$stages = array(
			'name' => 'Awesome stage',
			'project_id' => '1',
			'weight' => '1',
		);

		// Uncomment the below to run the seeder
		DB::table('stages')->insert($stages);
	}

}
