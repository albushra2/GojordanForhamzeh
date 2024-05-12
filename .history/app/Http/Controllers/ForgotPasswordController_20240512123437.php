<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function reset(){
        return view('password.reset')
    }
    public function sendEmail(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email', $request->email)->count();
        if ($user == 0) {
            return redirect()->route('auth.forgotPage')->with('error', 'User does not exist.');
        }
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
        Mail::send('emails.send', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('auth.forgotPage')->with('success', 'Reset link sent to the given mail');
    }
}
