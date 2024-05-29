@php
    use Illuminate\Support\Str;
@endphp

@extends('layout')

@section('content')
    @include('partial._hero')
    @include('partial._search')

    <div class="flex flex-col lg:flex-row gap-8 w-3/4 mx-auto">
        <div class="w-full lg:w-3/4" id="Articles">
            <h1 class="text-3xl font-bold mb-6 text-white">Articles</h1>
            <div class="space-y-6">
                @foreach ($listings as $listing)
                    @php
                        $created = $listing->created_at->toDateString();
                        $user = \App\Models\User::find($listing->user_id);
                        $name = $user->name;
                        $substring = Str::substr($listing->content, 0, 200);
                        $substring = strip_tags($substring) . '...';
                        $likeCount = $listing->likedByUsers()->count();
                        $commentCount = $listing->comments()->count();
                    @endphp
                    <div class="rounded-lg shadow-md overflow-hidden flex flex-col lg:flex-row mb-20"
                        style="background-color:rgb(36 34 40)">
                        <div class="w-full lg:w-1/2 relative">
                            <a href="{{ url('listings', $listing->id) }}">
                                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo):  asset('images/bebiluni.jpeg') }}" class="w-full h-full object-cover listingImg">
                            </a>
                            <div class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">Save</div>
                        </div>
                        <div class="p-4 lg:p-6 flex flex-col justify-between w-full lg:w-1/2">
                            <div>
                                <div class="flex items-center space-x-2 text-sm mb-2" style="color:rgb(158 170 187)">
                                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/no-image.png') }}"
                                        alt="Avatar" class="w-6 h-6 rounded-full">
                                    <div class="flex flex-start flex-col">
                                        <span>{{ $name }}</span>
                                        <span>{{ $created }}</span>
                                    </div>
                                    <span class="mt-auto">2 min read</span>
                                </div>
                                <x-tags-card :tagsCsv="$listing->tags" />
                                <h1 class="text-3xl font-semibold mb-2 mt-5">{{ $listing->title }}</h1>
                                <p class="mt-5 text-xl" style="color:rgb(198 208 223)">{!! $substring !!}</p>
                            </div>
                            <!-- Like and Comment Buttons -->
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex items-center">
                                    @auth
                                        @if (auth()->user()->hasLiked($listing->id))
                                        <form action="{{ url('listings/' . $listing->id . '/dislike') }}" method="POST">
                                            @csrf
                                            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                                                <i class="fas fa-thumbs-up"></i> Liked
                                            </button>
                                        </form>
                                        @else
                                            <form action="{{ url('listings/' . $listing->id . '/like') }}" method="POST">
                                                @csrf
                                                <button class="like-button bg-blue-500 text-white px-4 py-2 rounded mr-2"
                                                    data-listing-id="{{ $listing->id }}">
                                                    <i class="fas fa-thumbs-up"></i> Like
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    <span class="ml-2 text-white">{{ $likeCount }} likes</span>
                                </div>
                                <div class="flex items-center">
                                    @auth
                                    <button class="comment-button bg-green-500 text-white px-4 py-2 rounded"
                                        data-listing-id="{{ $listing->id }}">
                                        <i class="fas fa-comment"></i> Comment
                                    </button>
                                    @endauth
                                    <span class="ml-2 text-white">{{ $commentCount }} comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <h2 class="text-2xl font-bold mb-6 text-white">Trending Articles</h2>
            <div class="space-y-4">
                @foreach ($trendingListings as $trendingListing)
                    <div class="p-4 rounded-lg shadow-md border border-gray-800">
                        <a href="{{ url('listings', $trendingListing->id) }}"
                            class="text-lg font-semibold text-blue-400 hover:text-blue-600">{{ $trendingListing->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mt-6 px-4 flex justify-center items-center">
        {{ $listings->links('vendor.pagination.tailwind-dark') }}
    </div>
@endsection
