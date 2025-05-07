<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\TourGuide;

class TourGuidesTableSeeder extends Seeder
{
    public function run()
    {
        $guides = [
            [
                'id' => 1,
                'name' => 'محمد الزعبي',
                'email' => 'mohammad@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0791234567',
                'specialization' => 'السياحة الدينية',
                'bio' => 'مرشد سياحي مختص بالمواقع الدينية مثل المغطس وجبل نيبو.',
                'languages' => 'العربية, الإنجليزية',
                'rating' => 4.8,
                'reviews_count' => 120,
                'avatar' => 'guides/mohammad.jpg',
            ],
            [
                'id' => 2,
                'name' => 'ليلى النمر',
                'email' => 'layla@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0786543210',
                'specialization' => 'السياحة التاريخية',
                'bio' => 'أرشد المجموعات في البتراء وجرش لأكثر من 5 سنوات.',
                'languages' => 'العربية, الإنجليزية, الفرنسية',
                'rating' => 4.9,
                'reviews_count' => 85,
                'avatar' => 'guides/layla.jpg',
            ],
            [
                'id' => 3,
                'name' => 'خالد عمر',
                'email' => 'khaled@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0779998888',
                'specialization' => 'السياحة المغامراتية',
                'bio' => 'خبير في تنظيم رحلات التخييم والمشي في وادي رم.',
                'languages' => 'العربية, الإنجليزية',
                'rating' => 4.7,
                'reviews_count' => 60,
                'avatar' => 'guides/khaled.jpg',
            ],
        ];

        foreach ($guides as $guide) {
            TourGuide::create($guide);
        }
    }
}
