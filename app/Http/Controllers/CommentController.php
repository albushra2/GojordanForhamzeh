<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
            'blog_id' => 'required|exists:blogs,id'
        ]);
        
        // إنشاء التعليق الجديد
        $comment = new Comment();
        $comment->body = $validated['body'];
        $comment->blog_id = $validated['blog_id'];
        $comment->user_id = Auth::id(); // أو Auth::guard('travel_user')->id() إذا كنت تستخدم guard مخصص
        $comment->save();
        
        // إعادة التوجيه مع رسالة نجاح
        return back()->with('success', 'تم إضافة التعليق بنجاح!');
    }
}