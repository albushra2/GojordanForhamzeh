<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diary;

class DiariesTableSeeder extends Seeder
{
    public function run()
    {
        $diaries = [
            [
                'title' => 'رحلة إلى البحر الميت',
                'content' => 'كانت رحلتي إلى البحر الميت رائعة للغاية. استمتعت بالسباحة في المياه المالحة والجلوس على الشاطئ. كانت الأجواء هادئة ومريحة.',
                'user_id' => 1, // تأكدي من أن ID=1 في جدول المستخدمين
                'travel_package_id' => 1, // تأكدي من أن ID=1 في جدول الباكيجات السياحية
                'booking_id' => 1, // تأكدي من أن ID=1 في جدول الحجز
            ],
            [
                'title' => 'استكشاف مدينة البتراء',
                'content' => 'البتراء كانت مذهلة! الهندسة المعمارية الرائعة والمناظر الطبيعية الخلابة جعلت هذه الرحلة لا تنسى. مرشدنا السياحي كان رائعاً.',
                'user_id' => 2, // تأكدي من أن ID=2 في جدول المستخدمين
                'travel_package_id' => 2, // تأكدي من أن ID=2 في جدول الباكيجات السياحية
                'booking_id' => 2, // تأكدي من أن ID=2 في جدول الحجز
            ],
            [
                'title' => 'مغامرة في وادي رم',
                'content' => 'كانت المغامرة في وادي رم مثيرة للغاية! قمت بركوب الجمال والتنقل عبر الصحراء. تجربة لا تفوت!',
                'user_id' => 3, // تأكدي من أن ID=3 في جدول المستخدمين
                'travel_package_id' => 3, // تأكدي من أن ID=3 في جدول الباكيجات السياحية
                'booking_id' => 3, // تأكدي من أن ID=3 في جدول الحجز
            ],
        ];

        foreach ($diaries as $diary) {
            Diary::create($diary);
        }
    }
}
