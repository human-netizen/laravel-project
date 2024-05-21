@extends('layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-gray-900 p-6 rounded shadow-md">
            <h2 class="text-2xl font-bold text-white mb-4">Battleground</h2>
            
            <div class="grid grid-cols-1 gap-4">
                @foreach ($battles as $battle)
                    <div class="battle-card p-4 rounded-lg shadow-md flex justify-between items-center fancy-border bg-gray-800">
                        <div class="flex flex-col space-y-2 text-white">
                            <p><strong>Contest ID:</strong> {{ $battle->contest_id }}</p>
                            <p><strong>Problem Index:</strong> {{ $battle->problem_index }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($battle->status) }}</p>
                            @if($battle->status == 'accepted')
                                <p><strong>Start Time:</strong> {{ $battle->start_time }}</p>
                                <p><strong>Duration:</strong> {{ $battle->duration }} minutes</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
