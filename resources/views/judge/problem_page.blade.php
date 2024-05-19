@extends('layout')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-center">Recent Codeforces Problems</h1>
        <form action="#" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Search" class="form-input border border-gray-300 p-2 rounded-lg mr-3">
            <button type="submit" class="search-button px-4 py-2 rounded-lg">Search</button>
        </form>
    </div>

    @if(session('status'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4">
        @foreach ($problems as $problem)
            <div class="problem-card p-4 rounded-lg shadow-md flex justify-between items-center fancy-border">
                <div class="flex flex-col space-y-2">
                    <a href="https://codeforces.com/problemset/problem/{{$problem['problem']['contestId']}}/{{$problem['problem']['index']}}" class="text-xl font-bold mb-2 btn btn3 pl-2">{{ $problem['problem']['name'] }}</a>
                    <p class="ml-2 mt-2"><strong>Contest ID:</strong> {{ $problem['problem']['contestId'] }}</p>
                    <p class="ml-2"><strong>Index:</strong> {{ $problem['problem']['index'] }}</p>
                </div>
                <form action="{{ route('notify.user') }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <input type="hidden" name="contestId" value="{{ $problem['problem']['contestId'] }}">
                    <input type="hidden" name="index" value="{{ $problem['problem']['index'] }}">
                    <input type="text" name="username" placeholder="Username" class="form-input border border-gray-300 p-2 rounded-lg mr-3">
                    <button type="submit" class="submit-button px-4 py-2 rounded-lg">Submit</button>
                </form>
            </div>
        @endforeach
    </div>

    <div class="mt-6 header">
        {{ $problems->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
