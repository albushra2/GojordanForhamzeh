<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ContactRequest;

class ContactRequestsTableSeeder extends Seeder
{
    public function run()
    {
        $contactRequests = [
            [
                'name' => 'Ahmed Al-Faouri',
                'email' => 'ahmed@example.com',
                'phone' => '0791234567',
                'subject' => 'استفسار عن باكيج سياحي',
                'message' => 'أرغب في معرفة المزيد عن باكيج السياحة الثقافية في عمان.',
                'status' => 'unread',
                'response' => null,
                'user_id' => null, // إذا كان المستخدم غير مسجل في النظام
            ],
            [
                'name' => 'Mariam Khaled',
                'email' => 'mariam@example.com',
                'phone' => '0799876543',
                'subject' => 'مشكلة في الحجز',
                'message' => 'واجهت مشكلة في تأكيد الحجز الخاص بي، يرجى مساعدتي.',
                'status' => 'read',
                'response' => 'تم تأكيد الحجز بنجاح، شكراً لتواصلكم.',
                'user_id' => 2, // إذا كان المستخدم موجود في النظام
            ],
            [
                'name' => 'Razan Ali',
                'email' => 'razan@example.com',
                'phone' => '0793456789',
                'subject' => 'طلب تعديل في الحجز',
                'message' => 'أود تعديل مواعيد الحجز الخاص بي، يرجى التواصل معي.',
                'status' => 'replied',
                'response' => 'تم تعديل مواعيد الحجز كما طلبت.',
                'user_id' => 3, // إذا كان المستخدم موجود في النظام
            ],
        ];

        foreach ($contactRequests as $contactRequest) {
            ContactRequest::create($contactRequest);
        }
    }
}
