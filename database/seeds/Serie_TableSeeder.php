<?php
 
use Illuminate\Database\Seeder;
 
class SerieTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('series')->delete();

	$series = [['id' => 1, 'serie' => 'ES'],
		['id' => 2, 'serie' => 'L'],
		['id' => 3, 'serie' => 'S'],
		['id' => 4, 'serie' => 'Prepa']];
		
        //// Uncomment the below to run the seeder
        DB::table('series')->insert($series);
    }
 
}
