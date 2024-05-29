@extends('layout')
@section('content')
    @include('partial._search')    
    <!-- User List -->
    <div class="container mx-auto mt-8">
        <div class="shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">User List</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- User Card -->
                @foreach ($users as $user)
                    <div class="border rounded-lg p-4 userBox">
                        <div class="flex items-center">
                            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/no-image.png') }}" alt="Profile Picture" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                                <p class="text-gray-600">{{ $user->bio }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ url('/profile/' . $user->id) }}" class="text-blue-500 hover:underline">View Profile</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection


