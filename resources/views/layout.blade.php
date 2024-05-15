<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/favicon.ico" />
    <script src="https://unpkg.com/alpinejs" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
            // Other configurations...
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body>  <!-- Adjusted text color to midGray -->
    <nav class="navibar">
        <div class="logo"></div>
        @auth
            <ul class="layoutul">
                <li>
                    <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="btn">  <!-- Adjusted text and hover colors -->
                        <i class="fa-solid fa-gear"></i> Manage
                    </a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn">  <!-- Adjusted hover color -->
                            <div class="aclass">
                                <i class="fa-solid fa-door-closed"></i> 
                            Logout
                        </div>
                        </button>
                    </form>
                </li>
            </ul>
            <div class="icon" onclick="toggleNotifi()">
                <img src="/images/bell.png" alt=""> <span>17</span>
            </div>
            <div class="notibar"> 

            
            <div class="notifi-box" id="box">
                <h2>Notifications <span>17</span></h2>
                <div class="notifi-item">
                    <img src="/images/avatar1.png" alt="img">
                    <div class="text">
                       <h4>Elias Abdurrahman</h4>
                       <p>@lorem ipsum dolor sit amet</p>
                    </div> 
                </div>
    
                <div class="notifi-item">
                    <img src="/images/avatar2.png" alt="img">
                    <div class="text">
                       <h4>John Doe</h4>
                       <p>@lorem ipsum dolor sit amet</p>
                    </div> 
                </div>
    
                <div class="notifi-item">
                    <img src="/images/avatar3.png" alt="img">
                    <div class="text">
                       <h4>Emad Ali</h4>
                       <p>@lorem ipsum dolor sit amet</p>
                    </div> 
                </div>
    
                <div class="notifi-item">
                    <img src="/images/avatar4.png" alt="img">
                    <div class="text">
                       <h4>Ekram Abu </h4>
                       <p>@lorem ipsum dolor sit amet</p>
                    </div> 
                </div>
    
                <div class="notifi-item">
                    <img src="/images/avatar5.png" alt="img">
                    <div class="text">
                       <h4>Jane Doe</h4>
                       <p>@lorem ipsum dolor sit amet</p>
                    </div> 
                </div>
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
