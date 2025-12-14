<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function showRegistrationForm(){
        return view('auth.registration');
    }
    public function logout(Request $req){
        $req->session()->forget('user');
        return redirect()->route('loginForm')->with('success', 'Logged out successfully.');
    }
    public function registration(Request $req){
        try
        {
            $data = $req->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|',
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function login(Request $req){
        try
        {
            $credentials = $req->validate([
                'name' => 'required|string|max:255',
                'password' => 'required|string',
            ]);
            $user = User::where('name', $credentials['name'])->first();

            if($user && \Hash::check($credentials['password'], $user->password)){
                // Authentication passed...
                $req->session()->put('user', $user->id);
                return redirect()->route('dashboard')->with('success', 'Login successful.');
            } else {
                return redirect()->back()->with('error', 'Maaf anda bukan pacar saya portal ini khusus dibuat untuk pacar saya AYA!!!!! .');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
