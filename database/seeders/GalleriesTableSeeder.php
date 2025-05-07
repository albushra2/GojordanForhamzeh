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

'name' => 'البتراء - منظر ليلي',
'image' => 'galleries/petra-night.jpg',
'travel_package_id' => 1,

],

[

 'name' => 'وادي رم - التخييم تحت النجوم',

 'image' => 'galleries/wadirum-camping.jpg',

 'travel_package_id' => 2,
 ],
 [
'name' => 'جرش - الآثار الرومانية',

'image' => 'galleries/jerash-ruins.jpg',

'travel_package_id' => 3,

 ],

[

'name' => 'البحر الميت - غروب الشمس',

'image' => 'galleries/deadsea-sunset.jpg',

 'travel_package_id' => 1,

],

 ];



foreach ($galleries as $gallery) {
Gallery::create($gallery);

}

}

}

