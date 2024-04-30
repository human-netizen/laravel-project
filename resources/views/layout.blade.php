<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <script src="https://unpkg.com/alpinejs" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link src="css/app.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        deepBlack: "#121212",
                        coolGrey: "#242424",
                        darkGrey: "#2D2D2D",
                        midGray: "#636363",  // Changed from lightGray to midGray for better contrast
                        hoverGray: "#959595"  // Darker hover color for better readability
                    },
                    fontFamily: {
                        sans: ['UI Display', 'system-ui'],
                        serif: ['Editorial', 'Georgia'],
                        mono: ['UI Mono', 'SFMono-Regular'],
                    }
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="bg-coolGrey text-midGray mb-48">  <!-- Adjusted text color to midGray -->
    <nav class="flex justify-between items-center py-4 px-6 border-b border-darkGrey">
        <div class="logo"></div>
        @auth
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="bg-darkGrey text-white py-1 px-3 rounded hover:bg-hoverGray">  <!-- Adjusted text and hover colors -->
                        <i class="fa-solid fa-gear"></i> Manage
                    </a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="bg-darkGrey text-white py-1 px-3 rounded hover:bg-hoverGray">  <!-- Adjusted hover color -->
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
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
    <script>
       
    </script>
    
</body>

</html>
