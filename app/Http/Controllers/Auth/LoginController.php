<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ... other parts of your controller ...

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Or the path to your admin login view
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        if(!$user->is_admin) {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'You do not have admin privileges.'
            ]);
        }

        return redirect()->intended(route('admin.dashboard'));
    }

    return redirect()->back()->withErrors([
        'email' => 'Invalid admin credentials.'
    ]);
}
public function logout(Request $request)
{
    Auth::logout(); // Or Auth::guard('admin')->logout(); if using a specific admin guard

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/admin/login'); // Redirect to the admin login page
}
}
