<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() !==null) {
            if (Auth::check() && !Carbon::parse(Auth::user()->expires_at)->greaterThan(now()->subMinutes(10))) {
                $refreshToken = auth()->user()->refresh_token_key;
                $response = Http::get("https://candidate-testing.com/api/v2/token/refresh/{$refreshToken}");
            
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
                        // return redirect(route('dashboard'))->with("success", 'Author added successfully.');
                    } 
            }   
            
            return $next($request);
        } else {
            return redirect(route('login.form'));
        }
    }
}
