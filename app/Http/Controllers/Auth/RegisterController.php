<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'phone' => ['nullable', 'string', 'max:20'],
    //         'bio' => ['nullable', 'string'],
    //         'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'phone' => $data['phone'] ?? null,
    //         'bio' => $data['bio'] ?? null,
    //         'avatar' => $data['avatar'] ?? null,
    //     ]);
    // }

    // // Override register method to handle file upload
    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     // Handle avatar upload
    //     if ($request->hasFile('avatar')) {
    //         $avatarPath = $request->file('avatar')->store('avatars', 'public');
    //     } else {
    //         $avatarPath = null;
    //     }

    //     event(new Registered(
    //         $user = $this->create(array_merge(
    //             $request->except('avatar'),
    //             ['avatar' => $avatarPath]
    //         ))
    //     ));

    //     $this->guard()->login($user);

    //     return $this->registered($request, $user)
    //         ?: redirect($this->redirectPath());
    // }
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }
    protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

}

protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'is_admin' => true
    ]);
}
}