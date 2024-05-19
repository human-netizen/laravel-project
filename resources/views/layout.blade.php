<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/favicon.ico" />
    <script src="https://unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    {{-- 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link src="css/app.css" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('6afc5d0d3b3bb91db423', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

    <script></script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body> <!-- Adjusted text color to midGray -->
    <nav class="navibar">
        <div class="logo"></div>
        @auth
            <ul class="layoutul">
                <li class="flex justify-center items-center">
                    <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="btn"> <!-- Adjusted text and hover colors -->
                        <i class="fa-solid fa-gear"></i> Manage
                    </a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn"> <!-- Adjusted hover color -->
                            <div class="aclass">
                                <i class="fa-solid fa-door-closed"></i>
                                Logout
                            </div>
                        </button>
                    </form>
                </li>
            </ul>
            @php
            $notifications = Auth::user()->notifications;
        @endphp
            <div class="icon" onclick="toggleNotifi()">
                <img src="/images/bell.png" alt=""> <span>{{$notifications->count()}}</span>
            </div>
            

            <div class="notibar">
                <div class="notifi-box" id="box">
                    <h2>Notifications <span>{{$notifications->count()}}</span></h2>
                    
                    @foreach($notifications as $notification)
                        @php
                            $from = app\Models\User::find($notification->from_id)->name;
                        @endphp
                        <div class="notifi-item">
                            <img src="/images/avatar1.png" alt="img">
                            <div class="text">
                                <h4>{{$from}}</h4>
                                <p>{{$notification->content}}</p>
                                <div class="flex gap-4">
                                    <button>Accept</button>
                                    <button>Reject</button>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach


                </div>

            </div>
        @else
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="/register" class="text-midGray hover:text-hoverGray">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="text-midGray hover:text-hoverGray">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                    </a>
                </li>
            </ul>
        @endauth
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="w-full flex items-center justify-between font-bold bg-coolGrey text-white h-24 opacity-90">
        <p class="text-center flex-1">Copyright &copy; 2022, All Rights Reserved</p>
        <a href="/listings/create" class="bg-darkGrey text-white py-2 px-5 hover:bg-hoverGray">Post Job</a>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
