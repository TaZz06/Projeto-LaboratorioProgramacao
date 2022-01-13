<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'StepByStep' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/@themesberg/flowbite/dist/flowbite.bundle.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="bg-gradient-to-r from-zinc-800 to-gray-700">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="w-full flex-shrink-0 flex items-center space-x-3">
                            <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                            </svg>
                            <a class="block text-white text-2xl lg:block h-10 w-auto font-bold font-sans tracking-wide" href="{{ route('home') }}"> {{ 'StepByStep' }} </a>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                        @guest
                            @if (Route::has('login'))
                                <a class="block px-4 py-2 text-sm text-white" href="{{ route('login') }}" role="menuitem" id="user-menu-item-0">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="block px-4 py-2 text-sm text-white" href="{{ route('register') }}" role="menuitem" id="user-menu-item-0">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="ml-3 relative">
                                <div class="flex items-center space-x-3">
                                    <a class="block px-4 py-2 text-sm text-white" onclick="myFunction();"
                                    role="menuitem" id="user-menu-item-0">
                                        @if(Auth::user()->type_user == 'E') 
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        @elseif(Auth::user()->type_user == 'C')
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endguest
                    </div>

                    <div id="nav1" class="z-20 hidden origin-top-right absolute right-0 top-16 w-48 rounded-md shadow-lg py-2 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        @auth
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('profile') }} role="menuitem" tabindex="-1" id="user-menu-item-0" onclick="event.preventDefault();
                            document.getElementById('profile-form').submit();">{{ __('Profile') }}</a>
                            <form id="profile-form" action="{{ route('profile') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        @if(Auth::user()->type_user == 'E') 
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('insert_anuncio_form') }}" role="menuitem" tabindex="-1" id="user-menu-item-0" onclick="event.preventDefault();
                            document.getElementById('insertAnuncio-form').submit();">{{ __('Insert Ads') }}</a>
                            <form id="insertAnuncio-form" action="{{ route('insert_anuncio_form') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        @endif
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('logout') }}" role="menuitem" tabindex="-1" id="user-menu-item-0" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <main class="bg-gradient-to-b from-gray-500 to-violet-50 h-full">
        @yield('content')
    </main>
    <footer class="absolute w-full bg-gradient-to-r from-gray-700 to-zinc-800 flex flex-wrap items-center justify-between p-3 m-auto">
        <div class="container mx-auto flex flex-col flex-wrap items-center justify-between">
            <ul class="flex mx-auto subpixel-antialiased font-medium leading-relaxed text-gray-300 text-center font-sans">
              <li class="p-2 cursor-pointer hover:underline">Terms & Conditions</li>
              <li class="p-2 cursor-pointer hover:underline">Privacy</li>
              <li class="p-2 cursor-pointer hover:underline">Cookies</li>
            </ul>
            <ul class="flex mx-auto text-white text-center">
              <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" width="24" height="24" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></li>
              <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" width="24" height="24" viewBox="0 0 24 24"><path d="M21.231 0h-18.462c-1.529 0-2.769 1.24-2.769 2.769v18.46c0 1.531 1.24 2.771 2.769 2.771h18.463c1.529 0 2.768-1.24 2.768-2.771v-18.46c0-1.529-1.239-2.769-2.769-2.769zm-9.231 7.385c2.549 0 4.616 2.065 4.616 4.615 0 2.549-2.067 4.616-4.616 4.616s-4.615-2.068-4.615-4.616c0-2.55 2.066-4.615 4.615-4.615zm9 12.693c0 .509-.413.922-.924.922h-16.152c-.511 0-.924-.413-.924-.922v-10.078h1.897c-.088.315-.153.64-.2.971-.05.337-.081.679-.081 1.029 0 4.079 3.306 7.385 7.384 7.385s7.384-3.306 7.384-7.385c0-.35-.031-.692-.081-1.028-.047-.331-.112-.656-.2-.971h1.897v10.077zm0-13.98c0 .509-.413.923-.924.923h-2.174c-.511 0-.923-.414-.923-.923v-2.175c0-.51.412-.923.923-.923h2.174c.511 0 .924.413.924.923v2.175z" fillRule="evenodd" clipRule="evenodd"/></svg></li>
              <li class="p-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" width="24" height="24" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></li>
            </ul>
            <div class="flex mx-auto text-neutral-500 font-bold text-center leading-relaxed text-base font-sans">
                Copyright StepByStep | João Melo & Ricardo Pinheiro © 2022
            </div>
        </div>
    </footer>
    <script>
        function myFunction() {
            var x = document.getElementById("nav1");
            if (x.classList.contains("hidden")) {
                x.classList.add("visible")
                x.classList.remove("hidden");
            } else {
                x.classList.remove("visible")
                x.classList.add("hidden");
            }
        }
    </script> 
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
</body>
</html>

