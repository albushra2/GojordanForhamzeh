<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $search = $request->query('search');
        $role = $request->query('role');
        $trashed = $request->query('trashed'); 

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->when($role, function ($query) use ($role) {
                $query->where('is_admin', $role === 'admin');
            })
            ->when($trashed, function ($query) {
                $query->onlyTrashed();
            })
            ->withCount(['bookings', 'blogs'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:500',
            'is_admin' => 'boolean'
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:500',
            'is_admin' => 'boolean'
        ]);

        // Handle avatar update
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Update password only if provided
        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        try {
            $user->delete();
            return redirect()->back()
                ->with('success', 'User moved to trash successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting user: ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $user);

        try {
            $user->restore();
            return redirect()->back()
                ->with('success', 'User restored successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error restoring user: ' . $e->getMessage());
        }
    }
}