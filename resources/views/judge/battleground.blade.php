@extends('layout')

@section('content')
    @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            {{ session('status') }}
        </div>
    @endif
    <div class="container mx-auto mt-12">
        <div class="p-10 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">Battleground</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach ($battles as $battle)
                    <a
                        href="{{ route('battles.result', $battle->id) }}"class="battle-card p-6 rounded-lg shadow-lg border-l-4 border-colora result-card transform transition-transform hover:scale-105">
                        <div class="flex flex-col space-y-4 text-gray-300">
                            <p><strong>Contest ID:</strong> <span class="text-colora">{{ $battle->contest_id }}</span></p>
                            <p><strong>Problem Index:</strong> <span class="text-colora">{{ $battle->problem_index }}</span>
                            </p>
                            <p><strong>Status:</strong> <span class="text-colora">{{ ucfirst($battle->status) }}</span></p>
                            @if ($battle->status == 'accepted')
                                <p><strong>Start Time:</strong> <span class="text-colora">{{ $battle->start_time }}</span>
                                </p>
                                <p><strong>Duration:</strong> <span class="text-colora">{{ $battle->duration }}
                                        minutes</span></p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
