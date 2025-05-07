<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'content' => 'كانت تجربة رائعة! المرشد السياحي كان محترفاً جداً وأعطانا معلومات قيمة حول المعالم السياحية.',
                'rating' => 5,
                'user_id' => 1, // تأكدي من أن ID=1 في جدول المستخدمين
                'booking_id' => 1, // تأكدي من أن ID=1 في جدول الحجز
                'reviewable_type' => 'App\Models\TourGuide', // مراجعة للمرشد السياحي
                'reviewable_id' => 1, // تأكدي من أن ID=1 في جدول المرشدين
            ],
            [
                'content' => 'الرحلة كانت جيدة، لكن كان من الأفضل لو تم تخصيص وقت أكثر لبعض الأنشطة.',
                'rating' => 4,
                'user_id' => 2, // تأكدي من أن ID=2 في جدول المستخدمين
                'booking_id' => 2, // تأكدي من أن ID=2 في جدول الحجز
                'reviewable_type' => 'App\Models\TravelPackage', // مراجعة للباكيج السياحي
                'reviewable_id' => 2, // تأكدي من أن ID=2 في جدول الباكيجات السياحية
            ],
            [
                'content' => 'كانت الرحلة في وادي رم مذهلة! المناظر الطبيعية كانت خلابة ولكنني كنت أتمنى أن تكون الرحلة أطول.',
                'rating' => 4,
                'user_id' => 3, // تأكدي من أن ID=3 في جدول المستخدمين
                'booking_id' => 3, // تأكدي من أن ID=3 في جدول الحجز
                'reviewable_type' => 'App\Models\TourGuide', // مراجعة للمرشد السياحي
                'reviewable_id' => 2, // تأكدي من أن ID=2 في جدول المرشدين
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
