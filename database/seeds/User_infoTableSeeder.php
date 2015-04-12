<?php
 
use Illuminate\Database\Seeder;
 
class User_infoTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user_info')->delete();

	$faker = Faker\Factory::create('fr_FR');
	$faker->addProvider(new Faker\Provider\fr_FR\Address($faker));

	//if we want to create the SAME seed generated data every time we run, instead of 
	//making file, just use the Faker->seed() call:
	$faker->seed(1234);

	$infos[] = ['iduser_info' => 1, 'info_lieu' => 'Nantes', 'info_gps' => $faker->latitude.','.$faker->longitude, 'info_poste' => 'Directeur Artistique', 'info_promo' => 1995, 'info_promo_type' => 'L'];

	$metiers = file(database_path()."/seeds/metiers.csv");
	$work_list = array(
	    'Étudiant', 'Poète', 'Programmeur', 'Entrepreneur', 'Commercial', 'Barman', 'Serveur', 'Œnologue'
	);
	$serie_list = array(
	    'ES','L','S'
	);
	
	//now, make our data array:
	for ($i=0; $i < 30; $i++) {
	    $key_work = array_rand($work_list);
	    $key_serie = array_rand($serie_list);
	    $info = array(
		'iduser_info' => null,
		    'info_lieu' => $faker->city,
		    'info_gps' => $faker->latitude.','.$faker->longitude,
		    'info_poste' => ucwords(strtolower(explode('=',$metiers[array_rand($metiers)])[1])),
		    'info_promo' => $faker->year,
		    'info_promo_type' => $serie_list[$key_serie]
	    );
	    $infos[] = $info;
	}
	
        //// Uncomment the below to run the seeder
        DB::table('user_info')->insert($infos);
    }
 
}
