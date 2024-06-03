<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function showRegistrationForm()
    {
        $departemens = Departemen::all();
        return view('auth.register', compact('departemens'));
    }

    public function register(Request $request)
    {
        dd($request);
        // Custom error messages for validation
        // $messages = [
        //     'npk.required' => 'NPK tidak boleh kosong.',
        //     'departemen.required' => 'Departemen tidak boleh kosong.',
        //     'password.required' => 'Password tidak boleh kosong.',
        //     'password.confirmed' => 'Password konfirmasi tidak cocok.',
        // ];

        // // Validate the request data with custom messages
        // $validator = Validator::make($request->all(), [
        //     'npk' => 'required|string|unique:users',
        //     'departemen' => 'required|exists:departemen,id',
        //     'password' => 'required|string|min:8|confirmed',
        // ], $messages);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->route('register-proses')
        //         ->withErrors($validator)
        //         ->withInput($request->except('password', 'password_confirmation'));
        // }

        // Create a new user with the provided data
        // $user = User::create([
        //     'npk' => $request->npk,
        //     'departemen_id' => $request->departemen,
        //     'password' => Hash::make($request->password),
        // ]);

        // Log the user in
        // Auth::login($user);

        // Redirect to the appropriate dashboard based on user role
        // if ($user->hasRole('admin')) {
        //     return redirect()->route('admin-dashboard');
        // } else {
        //     return redirect()->route('guest-dashboard');
        // }
    }
    public function verifyEmail(Request $request)
    {
        if ($request->route('id') == $request->user()->getKey()) {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect($this->redirectPath())->with('verified', true);
            }

            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }

            return redirect($this->redirectPath())->with('verified', true);
        }

        abort(403, 'Invalid verification link.');
    }

    public function showVerificationNotice(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('auth.verify');
    }

    public function resendVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
