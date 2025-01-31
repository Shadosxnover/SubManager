<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Update the user's profile information.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        // Handle profile picture upload if present
        if ($request->hasFile('profile_picture')) {
            // Add your file upload logic here
            // Example:
            // $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            // $user->update(['profile_picture' => $path]);
        }

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Verify the user's current password.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        return redirect()->route('password.reset');
    }

    /**
     * Update the user's password.
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    /**
     * Show the password reset form.
     *
     * @return \Illuminate\View\View
     */
    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }
}