<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/favicon.ico" />
    <script src="https://unpkg.com/alpinejs" defer></script>
    
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <!-- Ensure FontAwesome is loaded -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CodeChamp</title>
</head>

<body class="bg-colorbody text-colorp">
    <nav class="bg-dark shadow-lg navibar">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a class="text-white text-lg font-semibold" href="/">
                    <img src="/images/logo.png" alt="Logo" class="h-8 w-8 inline-block mr-2">
                    CodeChamp
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                @php
                $notifications = Auth::user()->notifications;
                $user = Auth::user();
                $pendingNotifications = $notifications->filter(function ($notification) {
                    $battle = \App\Models\Battle::find($notification->battle_id);
                    return $battle && $battle->status == 'pending';
                });
                @endphp
                    <span class="text-white">Welcome, {{ auth()->user()->name }}</span>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="text-white hover:text-colora2 relative">
                            <i class="fa-solid fa-bell"></i> <!-- Notification bell icon -->
                            <span class="absolute top-0 right-0 bg-colora2 text-white rounded-full text-xs px-1.5">{{$pendingNotifications->count()}}</span>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg overflow-hidden z-20">
                            <div class="py-2">
                                <h3 class="text-gray-800 text-center font-semibold">Notifications ({{$pendingNotifications->count()}})</h3>
                                @foreach($pendingNotifications as $notification)
                                    @php
                                        $from = \App\Models\User::find($notification->from_id)->name;
                                    @endphp
                                    <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100">
                                        <img class="h-8 w-8 rounded-full object-cover mx-1" src="/images/avatar1.png" alt="avatar">
                                        <div class="ml-2">
                                            <h4 class="text-gray-800 font-semibold">{{$from}}</h4>
                                            <p class="text-gray-600 text-sm">{{$notification->problem_name}}</p>
                                            <div class="flex gap-2 mt-2">
                                                <form action="{{route('battles.accept', ['id' => $notification->battle_id])}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded text-sm">Accept</button>
                                                </form>
                                                <form action="{{route('battles.reject', ['id' => $notification->battle_id])}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="text-white hover:text-colora2 relative flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/no-image.png') }}" alt="profile">
                            <i class="fa-solid fa-chevron-down ml-2"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg overflow-hidden z-20">
                            <a href="/profile/{{$user->id}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                            <a href="/settings" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
                            <form action="/logout" method="POST" class="block w-full">
                                @csrf
                                <button type="submit" class="bg-white w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/register" class="text-white hover:text-colora2"><i class="fa-solid fa-user-plus"></i> Register</a>
                    <a href="/login" class="text-white hover:text-colora2"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="w-full h-1px mb-40"></div>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2022 CodeChamp, All Rights Reserved</p>
            <br>
            <a href="/listings/create" class="bg-colora hover:bg-colora2 text-white py-2 px-5 rounded"><i class="fa-solid fa-plus"></i> Post Job</a>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
