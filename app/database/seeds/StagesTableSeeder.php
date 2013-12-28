<?php

class StagesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stages')->truncate();

		$stages[] = array(
			'name' => 'Awesome stage 1',
			'project_id' => '1',
			'weight' => '2',
			'completed' => 0,
		);

		$stages[] = array(
			'name' => 'Awesome stage 2',
			'project_id' => '1',
			'weight' => '5',
			'completed' => 1,
		);

		$stages[] = array(
			'name' => 'Awesome stage 3',
			'project_id' => '1',
			'weight' => '4',
			'completed' => 0,
		);

		// Uncomment the below to run the seeder
		DB::table('stages')->insert($stages);
	}

}
