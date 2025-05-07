<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\TravelPackage;

class TravelPackagesTableSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'title' => 'رحلة إلى البتراء',
                'type' => 'تاريخية',
                'location' => 'البتراء، معان',
                'price' => 50,
                'duration_days' => 1,
                'description' => 'استمتع بزيارة مدينة البتراء الوردية، إحدى عجائب الدنيا السبع.',
                'itinerary' => 'الوصول صباحًا - جولة مشي في السيق - زيارة الخزنة - الغداء - العودة.',
                'included' => 'النقل، تذاكر الدخول، الغداء، مرشد سياحي.',
                'excluded' => 'المصاريف الشخصية.',
                'category_id' => 3, // تأكدي من أن ID=3 في جدول categories = تاريخية
                'tour_guide_id' => 2, // تأكدي من أن ID=2 في جدول المرشدين = ليلى
            ],
            [
                'title' => 'مغامرة في وادي رم',
                'type' => 'مغامراتية',
                'location' => 'وادي رم، العقبة',
                'price' => 70,
                'duration_days' => 2,
                'description' => 'تجربة خيالية في صحراء وادي رم مع التخييم تحت النجوم.',
                'itinerary' => 'جولة بسيارات الدفع الرباعي - التخييم - مشاهدة النجوم - الإفطار والعودة.',
                'included' => 'التنقل، العشاء والإفطار، مرشد سياحي، التخييم.',
                'excluded' => 'ركوب الجمال (اختياري).',
                'category_id' => 4,
                'tour_guide_id' => 3,
            ],
            [
                'title' => 'جولة دينية في المغطس',
                'type' => 'دينية',
                'location' => 'المغطس، البحر الميت',
                'price' => 30,
                'duration_days' => 1,
                'description' => 'زيارة موقع تعميد السيد المسيح ومشاهدة أهم المعالم الدينية.',
                'itinerary' => 'الوصول - جولة في الموقع - زيارة الكنائس - الغداء - العودة.',
                'included' => 'النقل، تذاكر الدخول، مرشد سياحي.',
                'excluded' => 'الوجبات الخاصة.',
                'category_id' => 1,
                'tour_guide_id' => 1,
            ],
        ];

        foreach ($packages as $package) {
            TravelPackage::create([
                'title' => $package['title'],
                'slug' => Str::slug($package['title'], '-'),
                'type' => $package['type'],
                'location' => $package['location'],
                'price' => $package['price'],
                'duration_days' => $package['duration_days'],
                'description' => $package['description'],
                'itinerary' => $package['itinerary'],
                'included' => $package['included'],
                'excluded' => $package['excluded'],
                'category_id' => $package['category_id'],
                'tour_guide_id' => $package['tour_guide_id'],
                'average_rating' => 0,
                'reviews_count' => 0,
            ]);
        }
    }
}
