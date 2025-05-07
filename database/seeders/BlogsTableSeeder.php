<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        $blogs = [
            [
                'title' => 'أفضل الأماكن السياحية في الأردن',
                'slug' => Str::slug('أفضل الأماكن السياحية في الأردن'),
                'excerpt' => 'اكتشف أفضل المواقع السياحية في الأردن من البحر الميت إلى البتراء.',
                'image' => 'blogs/jordan-tourist-places.jpg',
                'description' => 'تعتبر الأردن من الوجهات السياحية الفريدة التي تجمع بين التاريخ والثقافة والمغامرة.',
                'reads' => 120,
                'category_id' => 1, // تأكدي من أن ID=1 في جدول الفئات (مثلاً سياحة ثقافية)
                'user_id' => 1, // تأكدي من أن ID=1 في جدول المستخدمين (مثلاً الكاتب الأول)
            ],
            [
                'title' => 'رحلة إلى البتراء',
                'slug' => Str::slug('رحلة إلى البتراء'),
                'excerpt' => 'البتراء هي إحدى عجائب العالم السبع. تعرف على أهم معالمها وأماكن زيارتها.',
                'image' => 'blogs/petra-journey.jpg',
                'description' => 'البتراء هي مدينة تاريخية تقع في جنوب الأردن، وتعتبر واحدة من عجائب الدنيا السبع.',
                'reads' => 85,
                'category_id' => 2, // تأكدي من أن ID=2 في جدول الفئات (مثلاً سياحة تاريخية)
                'user_id' => 2, // تأكدي من أن ID=2 في جدول المستخدمين
            ],
            [
                'title' => 'مغامرة في وادي رم',
                'slug' => Str::slug('مغامرة في وادي رم'),
                'excerpt' => 'اكتشف مغامرات وادي رم، الأرض التي تشهد على التاريخ والمغامرة.',
                'image' => 'blogs/wadi-rum-adventure.jpg',
                'description' => 'وادي رم هو مكان يتيح للسياح استكشاف المناظر الطبيعية الصحراوية المدهشة والتخييم في قلب الصحراء.',
                'reads' => 60,
                'category_id' => 3, // تأكدي من أن ID=3 في جدول الفئات (مثلاً سياحة مغامراتية)
                'user_id' => 3, // تأكدي من أن ID=3 في جدول المستخدمين
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
