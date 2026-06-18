<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Check if user with this email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Don't reveal if email exists or not for security
            return back()->with('status', 'Jika email Anda terdaftar, Anda akan diarahkan untuk reset password.');
        }

        // Generate a token
        $token = Str::random(60);

        // Store the token in password_reset_tokens table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now(),
            ]
        );

        // Redirect to reset password page with token and email
        return redirect()->route('password.reset', [
            'token' => $token,
            'email' => $request->email,
        ])->with('status', 'Email ditemukan! Silakan buat password baru Anda.');
    }
}
