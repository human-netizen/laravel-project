@extends('layout')

@section('content')
<div class="container mx-auto mt-12">
    <div class="p-8 rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold text-white mb-8 text-center">Battle Result</h2>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- User 1 Card -->
            <div class="flex-1 p-6 result-card rounded-lg shadow-md border-l-4 border-blue-400">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('/storage/' . $user1->profile_image) }}" alt="{{ $user1->name }}" class="w-16 h-16 rounded-full mr-4 border-2 border-blue-400">
                    <div>
                        <h3 class="text-2xl font-bold text-blue-400">{{ $user1->name }}</h3>
                        <p class="text-gray-400 text-sm">{{ $user1->email }}</p>
                    </div>
                </div>
                <h4 class="text-xl font-bold text-blue-400 mt-8 mb-4">User 1 Submission</h4>
                <div class="space-y-4 text-gray-300">
                    <p><strong>Submission ID:</strong> {{ $battle->user1_submission_id }}</p>
                    <p><strong>Verdict:</strong> <span class="text-white">{{ $user1Submission['verdict'] }}</span></p>
                    <p><strong>Creation Time:</strong> <span class="text-white">{{ $user1Submission['creation_time'] }}</span></p>
                </div>
            </div>

            <!-- User 2 Card -->
            <div class="flex-1 p-6 result-card rounded-lg shadow-md border-l-4 border-green-400">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('/storage/' . $user2->profile_image) }}" alt="{{ $user2->name }}" class="w-16 h-16 rounded-full mr-4 border-2 border-green-400">
                    <div>
                        <h3 class="text-2xl font-bold text-green-400">{{ $user2->name }}</h3>
                        <p class="text-gray-400 text-sm">{{ $user2->email }}</p>
                    </div>
                </div>
                <h4 class="text-xl font-bold text-green-400 mt-8 mb-4">User 2 Submission</h4>
                <div class="space-y-4 text-gray-300">
                    <p><strong>Submission ID:</strong> {{ $battle->user2_submission_id }}</p>
                    <p><strong>Verdict:</strong> <span class="text-white">{{ $user2Submission['verdict'] }}</span></p>
                    <p><strong>Creation Time:</strong> <span class="text-white">{{ $user2Submission['creation_time'] }}</span></p>
                </div>
            </div>
        </div>

        <!-- Battle Details Card -->
        <div class="mt-8 p-6 result-card rounded-lg shadow-md border-l-4 border-yellow-400">
            <h3 class="text-2xl font-bold text-yellow-400 mb-6">Battle Summary</h3>
            <div class="space-y-4 text-gray-300">
                <p><strong>Contest ID:</strong> {{ $battle->contest_id }}</p>
                <p><strong>Problem Index:</strong> {{ $battle->problem_index }}</p>
                <p><strong>Status:</strong> <span class="text-white">{{ ucfirst($battle->status) }}</span></p>
                <p><strong>Result:</strong> <span class="text-white">{{ $result }}</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
