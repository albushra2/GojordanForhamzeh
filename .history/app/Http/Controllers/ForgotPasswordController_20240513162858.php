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
        // Find the token in the database
        $passwordResetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        // Check if the token exists and is not expired
        if (!$passwordResetToken || $this->tokenExpired($passwordResetToken->created_at)) {
            // Token is invalid or expired, handle accordingly (e.g., show error message)
            throw ValidationException::withMessages([
                'token' => ['Invalid or expired token'],
            ]);
        }

        // Find the user corresponding to the email in the password reset token
        $user = DB::table('users')->where('email', $passwordResetToken->email)->first();

        // Update the user's password
        DB::table('users')->where('email', $passwordResetToken->email)->update([
            'password' => Hash::make($request->input('password')), // Assuming the password field is named 'password'
        ]);

        // Optionally, delete the used token to prevent it from being used again
        DB::table('password_reset_tokens')->where('token', $token)->delete();

        // Redirect the user to a success page or login page
        return redirect()->route('login')->with('success', 'Password updated successfully');
    }

    // Helper function to check if the token is expired
    protected function tokenExpired($createdAt)
    {
        $expirationTime = now()->subMinutes(config('auth.passwords.users.expire'));
        return $createdAt < $expirationTime;
    }
}
