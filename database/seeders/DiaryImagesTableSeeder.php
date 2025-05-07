<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DiaryImage;

class DiaryImagesTableSeeder extends Seeder
{
    public function run()
    {
        $diaryImages = [
            [
                'image' => 'images/diaries/1.jpg', // تأكدي من أن الصورة موجودة في المجلد المناسب
                'diary_id' => 1, // تأكدي من أن ID=1 في جدول اليوميات
            ],
            [
                'image' => 'images/diaries/2.jpg', // تأكدي من أن الصورة موجودة في المجلد المناسب
                'diary_id' => 2, // تأكدي من أن ID=2 في جدول اليوميات
            ],
            [
                'image' => 'images/diaries/3.jpg', // تأكدي من أن الصورة موجودة في المجلد المناسب
                'diary_id' => 3, // تأكدي من أن ID=3 في جدول اليوميات
            ],
        ];

        foreach ($diaryImages as $diaryImage) {
            DiaryImage::create($diaryImage);
        }
    }
}

