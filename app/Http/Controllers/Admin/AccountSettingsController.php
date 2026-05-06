<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountSettingsController extends Controller
{
    public function edit()
    {
        return view('admin.account-settings');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['new_password'])) {
            if (empty($validated['current_password']) || !Hash::check((string) $validated['current_password'], (string) $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
            }

            $user->password = $validated['new_password'];
        }

        $user->name = $validated['first_name'] . ' ' . $validated['last_name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->bio = $validated['bio'] ?? null;

        $oldImage = $user->profile_image;

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('avatars', 'public');
            $user->profile_image = $path;

            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $user->save();

        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'account.updated',
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'properties' => [
                'updated_fields' => array_values(array_filter([
                    'name',
                    'email',
                    $request->hasFile('profile_image') ? 'profile_image' : null,
                    !empty($validated['new_password']) ? 'password' : null,
                ])),
            ],
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1024),
        ]);

        return back()->with('success', 'Account updated successfully');
    }
}
