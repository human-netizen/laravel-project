<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        $listings = (array) Listing::class;

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tags', 'search']))->paginate(4) , 
            'trendingListings' => Listing::inRandomOrder()->limit(4)->get()
        ]);
    }
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        return redirect('/')->with('message', "Listing created successfully");
    }
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }
    public function update(Request $request , Listing $listing){
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        //dd($formFields);
        $listing->update($formFields);
        return back()->with('message', "Listing created successfully");
    }
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message' , 'Deleted Successfully');
    }
    public function like($id)
    {
        $listing = Listing::findOrFail($id);
        if (auth()->user()->hasLiked($id)) {
            return redirect()->back()->with('error', 'You have already liked this article!');
        }

        // Attach the like
        auth()->user()->likes()->attach($id);
        $listing->increment('likeCount');
        $listing->save();
        return back()->with('message', "Liked post");
    }

    public function dislike($id)
    {
        $listing = Listing::findOrFail($id);

        $like = Like::where('user_id', auth()->id())->where('listing_id', $id)->first();

        if (!$like) {
            return redirect()->back()->with('error', 'You have not liked this listing yet!');
        }

        $like->delete();

        return redirect()->back()->with('success', 'You disliked the listing!');
    }
}
