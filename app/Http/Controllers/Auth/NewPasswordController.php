<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Find the token in password_reset_tokens table
        $resetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetToken) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Link reset password tidak valid atau sudah kadaluarsa.']);
        }

        // Check if token is not too old (24 hours)
        if (now()->diffInMinutes($resetToken->created_at) > 1440) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Link reset password telah kadaluarsa. Silakan coba lagi.']);
        }

        // Find the user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Update the password
        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        // Delete the reset token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Fire password reset event
        event(new PasswordReset($user));

        return redirect()->route('login')->with('status', '✓ Password berhasil diubah! Silakan login dengan password baru Anda.');
    }
}
