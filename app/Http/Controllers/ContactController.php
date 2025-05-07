<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // إرسال رسالة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000'
        ]);

        auth()->user()->contactRequests()->create($validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}