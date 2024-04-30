<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(){
        return view('users.register');
    }
    public function store(Request $request){
        $formField = $request->validate([
            'name' => 'required|min:3' ,
            'email' => 'required|email' , 
            'password' => 'required|min:6|confirmed'
        ]);

        $formField['password'] = bcrypt($formField['password']);
        $user = User::create($formField);

        auth()->login($user);

        return redirect('/')->with('message' , 'User created and Login Successful');
    }
    public function logout(Request $request){
        auth() -> logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message' , 'You have been logout');
    }
    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formField = $request->validate([
            'email' => 'required|email' , 
            'password' => 'required'
        ]);
        if(auth() -> attempt($formField)){
            $request->session()->regenerate();

            return redirect('/')->with('message' , 'You are now logged in');
        }
        else{
            return back()->withErrors(['password' => 'Invalid Credentials'])->withInput($request->only('password'));

        }
    }
}

