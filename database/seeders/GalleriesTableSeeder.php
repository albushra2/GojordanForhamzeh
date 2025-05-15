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
        'image' => 'galleries/ajlon.jpeg',
        'travel_package_id' => 1,
    ],

    [
        'name' => 'Wadi Rum - Camping Under the Stars',
        'image' => 'galleries/Amman.jpeg',
        'travel_package_id' => 2,
    ],

    [
        'name' => 'Dead Sea - Sunset',
        'image' => 'galleries/Aqaba.jpeg',
        'travel_package_id' => 1,
    ],

];

foreach ($galleries as $gallery) {
Gallery::create($gallery);

}

}

}

