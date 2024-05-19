<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SocialLink;
use App\Models\Post;

class ProfileController extends Controller
{
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
        $user->update($request->only('name', 'email', 'bio', 'hometown', 'relationship_status'));

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
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
