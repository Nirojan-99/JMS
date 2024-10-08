<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class authController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($user->role == 'user') {
                return redirect()->route('index');
            }else{
                return redirect()->route('adminHome');

            }
        } else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'The email address is not registered.',
        ]);

        $user = User::where('email', $request->email)->first();

        $code = rand(100000, 999999);
        Session::put('password_reset_code', $code);
        Session::put('password_reset_email', $request->email);
        Session::put('password_reset_code_expires_at', now()->addSeconds(90));

        Mail::to($request->email)->send(new ForgotPasswordMail($user->first_name, $code));

        return redirect()->route('verify')->with('success', 'A verification code has been sent to your email.' . $code); //TODO
    }

    public function verify()
    {
        return view('verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric',
        ]);

        $storedCode = Session::get('password_reset_code');
        $expiresAt = Session::get('password_reset_code_expires_at');

        if (now()->greaterThan($expiresAt)) {
            return redirect()->back()->withErrors(['verification_code' => 'The verification code has expired.']);
        }

        if ($request->verification_code != $storedCode) {
            return redirect()->back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        return redirect()->route('change_password')->with('status', 'Verification successful. You may now reset your password.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = Session::get('password_reset_email');
        if (!$email) {
            return back()->withErrors('Invalid session. Please start the password recovery process again.');
        }

        $user = User::where('email', $email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            Session::forget(['password_reset_code', 'password_reset_email', 'password_reset_code_expires_at']);

            return back()->with('status', 'Your password has been reset successfully.you can now login');
        }

        return back()->withErrors('User not found.');
    }


    public function change_password()
    {
        return view('change_password');
    }
}
