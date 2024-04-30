@props(['listing'])

@php
$created = $listing->created_at->toDateString();  
$name = \App\Models\User::find($listing->user_id)->name;
@endphp

<x-card class="bg-darkGrey border border-gray-600">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" 
             src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
             alt="" />
        <div>
            <h3 class="text-2xl text-white">
                <a href="/listings/{{$listing->id}}" class="text-white hover:text-gray-300">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4 text-gray-400">Acme Corp</div>
            <x-tags-card :tagsCsv="$listing->tags" class="text-gray-300 bg-gray-800"/>

            <div class="mt-3 flex space-x-6">
                <div class="text-lg text-white bg-gray-800 p-2 rounded-md">
                    {{$name}}
                </div>
                <div class="text-lg text-white bg-gray-800 p-2 rounded-md">
                    {{$created}}
                </div>
            </div>
        </div>
    </div>
</x-card>
