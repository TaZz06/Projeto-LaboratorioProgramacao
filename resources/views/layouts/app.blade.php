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
                        <div class="flex-shrink-0 flex items-center space-x-3">
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

                    <div id="nav1" class="hidden origin-top-right absolute right-0 top-16 w-48 rounded-md shadow-lg py-2 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" >
                        @auth
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('profile') }} role="menuitem" id="user-menu-item-0" onclick="event.preventDefault();
                            document.getElementById('profile-form').submit();">{{ __('Profile') }}</a>
                            <form id="profile-form" action="{{ route('profile') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @if(Auth::user()->type_user == 'E') 
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('insert_anuncio_form') }}" role="menuitem" id="user-menu-item-0" onclick="event.preventDefault();
                            document.getElementById('insertAnuncio-form').submit();">{{ __('Insert Ads') }}</a>
                            <form id="insertAnuncio-form" action="{{ route('insert_anuncio_form') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                            <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('logout') }}" role="menuitem" id="user-menu-item-0" onclick="event.preventDefault();
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
    <main class="bg-gradient-to-b from-gray-500 to-violet-50">
        @yield('content')
    </main>
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

