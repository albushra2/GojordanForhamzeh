<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'السياحة الدينية',
                'description' => 'زيارة المواقع الدينية مثل المغطس وجبل نيبو وغيرها.',
                'image' => 'categories/religious.jpg',
            ],
            [
                'name' => 'السياحة الثقافية',
                'description' => 'استكشاف التراث الثقافي والمهرجانات والموسيقى التقليدية.',
                'image' => 'categories/cultural.jpg',
            ],
            [
                'name' => 'السياحة التاريخية',
                'description' => 'زيارة المواقع الأثرية مثل البتراء وجرش.',
                'image' => 'categories/historical.jpg',
            ],
            [
                'name' => 'السياحة المغامراتية',
                'description' => 'أنشطة مثل التخييم، التسلق، ركوب الجمال، ومسارات المشي.',
                'image' => 'categories/adventure.jpg',
            ],
            [
                'name' => 'السياحة العلاجية',
                'description' => 'زيارة البحر الميت والينابيع الساخنة لأغراض الاستجمام والعلاج.',
                'image' => 'categories/medical.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name'], '-'),
                'description' => $category['description'],
                'image' => $category['image'],
            ]);
        }
    }
}
