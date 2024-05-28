@props(['listing'])

@php
$created = $listing->created_at->toDateString();  
$name = \App\Models\User::find($listing->user_id)->name;
use Illuminate\Support\Str;
$substring = Str::substr($listing->description, 0, 200) . "...";
@endphp

<x-card class="bg-gray-800 text-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
    <div class="flex flex-col md:flex-row items-start md:items-center">
        <div class="w-full md:w-1/3">
            <a href="{{ url('listings', $listing->id) }}">
                <img src="{{ asset('images/bebiluni.jpeg') }}" class="rounded-lg shadow-md w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
            </a>
        </div>
        <div class="md:ml-6 mt-4 md:mt-0 w-full md:w-2/3">
            <h3 class="text-2xl font-semibold mb-2">{{ $listing->title }}</h3>
            <p class="text-gray-400 mb-4">{{ $substring }}</p>
            <x-tags-card :tagsCsv="$listing->tags"/>
            <div class="flex space-x-4 mt-4">
                <a class="btn bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300" href="{{ url('listings', $listing->id) }}">View Listing</a>
                <a href="https://youtu.be/ef9zFZGNAsM?si=Rd_xrvvZ8-U90nxG" target="_blank" class="text-red-500 hover:text-red-700">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-card>
