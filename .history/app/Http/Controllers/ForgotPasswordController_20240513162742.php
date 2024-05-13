<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function reset($token){
        //dd($token);
        return view('auth.passwords.reset',['token'=>$token]);
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
        return redirect()->route('homepage')->with('success', 'Reset link sent to the given mail');
    }
    public function updatePassword(Request $request, $token)
    {
        // Find the token in the password_reset_tokens table
        $passwordResetToken = PasswordResetToken::where('token', $token)->first();

        // Check if the token exists and is not expired
        if (!$passwordResetToken || $passwordResetToken->isExpired()) {
            // Token is invalid or expired, handle accordingly (e.g., show error message)
            return redirect()->back()->with('error', 'Invalid or expired token');
        }

        // Find the user corresponding to the email in the password reset token
        $user = User::where('email', $passwordResetToken->email)->first();

        // Update the user's password
        $user->password = bcrypt($request->input('password')); // Assuming the password field is named 'password'
        $user->save();

        // Optionally, delete the used token to prevent it from being used again
        $passwordResetToken->delete();

        // Redirect the user to a success page or login page
        return redirect()->route('login')->with('success', 'Password updated successfully');
    }
}
