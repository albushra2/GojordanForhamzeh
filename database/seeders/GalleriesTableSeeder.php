<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Gallery;



class GalleriesTableSeeder extends Seeder

{

   public function run()

 {

  $galleries = [

    [
        'name' => 'Petra - Night View',
        'image' => 'galleries/petra-night.jpg',
        'travel_package_id' => 1,
    ],

    [
        'name' => 'Wadi Rum - Camping Under the Stars',
        'image' => 'galleries/wadirum-camping.jpg',
        'travel_package_id' => 2,
    ],

    [
        'name' => 'Jerash - Roman Ruins',
        'image' => 'galleries/jerash-ruins.jpg',
        'travel_package_id' => 3,
    ],

    [
        'name' => 'Dead Sea - Sunset',
        'image' => 'galleries/deadsea-sunset.jpg',
        'travel_package_id' => 1,
    ],

];

foreach ($galleries as $gallery) {
Gallery::create($gallery);

}

}

}

