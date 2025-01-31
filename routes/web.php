<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillController;

Route::get('/', function () {
    return view('home');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/password/reset', [ProfileController::class, 'showResetForm'])->name('password.reset');

Route::middleware(['auth'])->group(function () {
    // View profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Update profile information
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // Verify current password
    Route::post('/password/verify', [ProfileController::class, 'verifyPassword'])->name('password.verify');

    // Update password
    Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
});

Route::post('/register', function () {
    try {
        // Validate input
        $data = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);


        Log::info('User registered successfully', ['user' => $user]);

        // Redirect to login with success message
        return redirect('/login')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
        // Log any errors
        Log::error('Registration error: ' . $e->getMessage());

        // Return back with error message
        return back()->withErrors(['error' => $e->getMessage()]);
    }
});

// Handle login form submission
Route::post('/login', function () {
    $credentials = request()->only('email', 'password');

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        return redirect('/client-space');
    }

    // Return with error if login fails
    return redirect('/login')->withErrors(['email' => 'Invalid credentials']);
});

// Client space page route (requires authentication)
Route::get('/client-space', function () {
    return view('client-space');
})->middleware('auth');

// Logout route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Route::middleware('auth')->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
    Route::get('/client-space', [DashboardController::class, 'index'])->name('dashboard'); // Move the dashboard route inside the auth middleware group
});

Route::middleware('auth')->group(function () {
    Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
    Route::post('/bills/{bill}/update-status', [BillController::class, 'updateStatus'])->name('bills.update-status');
});

Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');