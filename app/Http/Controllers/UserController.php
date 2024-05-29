<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function create(){
        return view('users.register');
    }
    public function userList(){
        //dd(User::all());
        return view('users.userlist', [
            'users' => User::all()//->filter(request(['tags', 'search']))->paginate(4)
        ]);
    }
    public function store(Request $request){
        $formField = $request->validate([
            'name' => 'required|min:3' ,
            'email' => 'required|email' , 
            'username' => 'required' ,
            'password' => 'required|min:6|confirmed'
        ]);
        if ($request->hasFile('profile_image')) {
            $formField['profile_image'] = $request->file('profile_image')->store('profile_images', 'public');
        }

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
    public function show($id)
    {
        $user = User::find($id);
        $isFollowing = Auth::user()->isFollowing($user);
        return view('profile.show', compact('user', 'isFollowing'));
    }

    public function edit()
    {

        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        
        $user = Auth::user();
        $user->update($request->only('name', 'email', 'bio', 'hometown', 'relationship_status' , 'job' , 'location'));

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('cover_photos', 'public');
            $user->cover_photo = $path;
        }


        $user->save();

        // Update social links


        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully');
    }



    public function follow($id)
    {
        
        $user = User::findOrFail($id);
        $follower = Auth::user();

        if ($follower->id !== $user->id) {
            $follower->following()->attach($user->id);
            $user->increment('followers_count');
            $follower->increment('following_count');
        }

        return redirect()->route('profile.show', $user->id);
    }

    public function unfollow($id)
    {
        $user = User::findOrFail($id);
        $follower = Auth::user();

        if ($follower->id !== $user->id) {
            $follower->following()->detach($user->id);
            $user->decrement('followers_count');
            $follower->decrement('following_count');
        }

        return redirect()->route('profile.show', $user->id);
    }
}

