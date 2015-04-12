<?php
 
use Illuminate\Database\Seeder;
 
class TagTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user_tags')->delete();

	$faker = Faker\Factory::create('fr_FR');
	$faker->addProvider(new Faker\Provider\fr_FR\Address($faker));

	//if we want to create the SAME seed generated data every time we run, instead of 
	//making file, just use the Faker->seed() call:
	$faker->seed(1234);

	$records = DB::table('users')->select('id')->get();
	
	$tag_list = array(
	    'anglais','allemand','espagnol'
	);
	
	//now, make our data array:
	for ($i=0; $i < ($size = sizeof($records))*3; $i++) {
	    $key = array_rand($tag_list);
	    $tag = array(
		'id' => $records[$i%$size]->id,
		'info_tags' => $tag_list[$key]
	    );
	    $tags[] = $tag;
	}
	
        //// Uncomment the below to run the seeder
        DB::table('user_tags')->insert($tags);
    }
 
}
