@extends('layout')

@section('content')
    @include('partial._search', [
        'bg' => 'bg-gray-800',
        'textColor' => 'text-white',
        'hoverBg' => 'hover:bg-gray-700',
    ])
    <a href="/" class="inline-block text-gray-200 ml-4 mb-4 hover:text-gray-50">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-auto md:w-2/3 lg:w-3/4 px-6">
        <div class="col2 p-10 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold text-white">{{ $listing->title }}</h1>
                <div class="mt-4 text-gray-400">
                    <span class="block text-lg">{{ $listing->created_at->format('d M Y') }}</span>
                    <span class="block text-lg">By {{ $listing->user->name }}</span>
                </div>
            </div>

            <div class="flex justify-center mb-6">
                <img class="w-1/2 object-cover rounded-full"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="Company logo" />
            </div>

            <div class="border-t border-gray-700 my-6"></div>

            <div class="text-lg text-gray-300">
                <div class="ck-content text-left">
                    {!! $listing->content !!}
                </div>
            </div>

            <x-tags-card :tagsCsv="$listing->tags" />

            <div class="text-center mt-6">
                <a href="profilelink"
                    class="inline-block bg-blue-600 text-white py-2 px-6 rounded-xl hover:bg-blue-500 transition duration-300">
                    <i class="fa-solid fa-envelope"></i> Contact Me
                </a>
            </div>
        </div>
    </div>

    <x-card class="mt-6 p-4 flex space-x-6 text-white md:w-2/3 lg-w-3/4 mx-auto justify-between rounded-lg">
        <form method = "GET" action="/listings/{{ $listing->id }}/edit">
            @csrf
            <button class="hover:text-blue-700">
                <i class="fa-solid fa-pencil"></i> Edit
            </button>
        </form>

        <form method="POST" action="/listings/{{ $listing->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:text-red-700">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </form>
    </x-card>

    <div class="col2 p-10 rounded-lg md:w-2/3 lg-w-3/4 mx-auto mt-10">
        <h4 class="text-2xl font-semibold text-white mb-4">Write a Comment</h4>
        <form method="POST" action="/commentStore" class="space-y-4">
            @csrf
            <div class="flex flex-col space-y-4">
                <textarea id="myTextarea" name="content" rows="4" class="p-4 border border-gray-700 rounded-lg bg-gray-800 text-white" placeholder="Your comment..."></textarea>
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition duration-300">
                    Comment
                </button>
            </div>
        </form>

        <h4 class="text-2xl font-semibold text-white mt-10 mb-4">Comments</h4>
        <x-comment-card :comments="$listing->comments" :listing="$listing" />
    </div>
@endsection
