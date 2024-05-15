@extends('layout')
@section('content')
<div class="container">
    <div class="">
        @foreach ($userlists as $user)
            <!-- Dark themed listing cards with deeper grey background and subtle borders -->
            {{-- <x-listing-card :listing="$listing" class="border border-gray-600" /> --}}
            <div class="bg-gray-800 rounded-lg p-4 mb-4 mt-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        {{-- <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full"> --}}
                        <div class="mt-4">
                            <h2 class="text-lg font-semibold text-white">{{ $user->name }}</h2>
                            <p class="text-gray-400">{{ $user->email }}</p>
                        </div>
                    </div>
                    {{-- <a href="{{ route('users.show', $user) }}" class="text-blue-500 hover:text-blue-600">View Profile</a> --}}
                </div>
            </div>

        @endforeach
    </div>
</div>
@endsection
