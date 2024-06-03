<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showloginform()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $messages = [
            'npk.required' => 'NPK tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
        ];

        // Validate the request data with custom messages
        $validator = Validator::make($request->all(), [
            'npk' => 'required|string',
            'password' => 'required|string',
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Retrieve only the 'npk' and 'password' from the request
        $credentials = $request->only('npk', 'password');

        // Attempt to authenticate the user with the provided credentials
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            // Menampilkan SweetAlert modal
            return view('select-dashboard');
        }

        // If authentication fails, redirect back to the login page with an error message
        return redirect()->route('login')->with('error', 'NPK atau password salah.');
    }
}
