<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
             'role' => 'required',
        ]);


       User::created([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'role' => $request->role,
       ]);  

       return redirect('/login')->with('success', 'Registration successful! please log in.');
    }

        public function showLoginForm()
        {
            return view('auth.login');
        }

        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/');
            }

            return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
        }


       public function dashboard()
        {
            
            return view('restaurateur.dashboard'); 
        }



     



}
