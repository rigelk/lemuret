<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

	$faker = Faker\Factory::create('fr_FR');

	//if we want to create the SAME seed generated data every time we run, instead of 
	//making file, just use the Faker->seed() call:
	$faker->seed(1278634);

	$users[] = ['id' => 1, 'name' => 'Rault', 'prenom' => 'Pierre-Antoine', 'email' => 'par@rigelk.eu', 'password' => '$2y$10$naCJJ2eFKoaMeWlJYCG.YuWQPHG9o5zJapRulqyMmOKu9C8LlrrHK', 'remember_token' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime];
	//now, make our data array:
	for ($i=0; $i < 30; $i++) {
	    $user = array(
		'id' => null,
		'name' => $faker->lastName,
		    'prenom' => $faker->firstName,
		    'email' => $faker->email,
		    'password' => '$2y$10$naCJJ2eFKoaMeWlJYCG.YuWQPHG9o5zJapRulqyMmOKu9C8LlrrHK',
		    'remember_token' => null,
		    'created_at' => $faker->dateTime(),
		    'updated_at' => $faker->dateTime()
	    );
	    $users[] = $user;
	}
	
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
 
}
