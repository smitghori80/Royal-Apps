<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function loginForm()
    {
        if(auth()->user() !== null) {
            return redirect(route('dashboard'))->with("success", 'Your login has been successfully completed');
        }
        return view('authentication.login');
    }

    
    public function loginFormSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $response = Http::post('https://candidate-testing.com/api/v2/token', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $userData = $data['user'];
            $expiresAt = Carbon::parse($data['expires_at'])->format('Y-m-d H:i:s');
            $refreshExpiresAt = Carbon::parse($data['refresh_expires_at'])->format('Y-m-d H:i:s');
            $lastActiveDate = Carbon::parse($data['last_active_date'])->format('Y-m-d H:i:s');
    
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'gender' => $userData['gender'],
                    'active' => $userData['active'],
                    'login_token' => $userData['login_token'],
                    'password_reset_token' => $userData['password_reset_token'],
                    'email_confirmed' => $userData['email_confirmed'],
                    'created_at' => $userData['created_at'],
                    'updated_at' => $userData['updated_at'],
                    'token_key' => $data['token_key'],
                    'refresh_token_key' => $data['refresh_token_key'],
                    'expires_at' => $expiresAt,
                    'refresh_expires_at' => $refreshExpiresAt,
                    'last_active_date' => $lastActiveDate,

                ]
            );
            Auth::login($user); 
            return redirect(route('dashboard'))->with("success", 'Your login has been successfully completed');
        }

        if ($response->status() === 400) {
            return redirect(route('login.form'))->with("Error", 'Validation failed');
        }

        if ($response->status() === 403) {
            return redirect(route('login.form'))->with("Error", 'User not found, inactive, or invalid credentials');
        }

        return redirect(route('login.form'))->with("Error", 'An error occurred');

    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login.form'))->with("success", 'Your account logout successfully');
    }
}
