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
      <div>
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
      <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
         <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
         <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gradient-to-r from-zinc-800 to-gray-700 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
               <div class="flex items-center">
                  <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                  </svg>
                  <a class="text-white text-2xl mx-2 font-semibold" href="{{ route('home') }}"> Admin<br>Dashboard </a>
               </div>
            </div>
            <nav id="dashboardNav"class="mt-10">
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="u" href="{{ route('users_dashboard') }}">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                  </svg>
                  <span class="mx-3">Users<br>Dashboard</span>
               </a>
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="c" href="{{ route('candidates_dashboard') }}">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                  </svg>
                  <span class="mx-3">Candidates Dashboard</span>
               </a>
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="e" href="{{ route('companies_dashboard') }}">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                  </svg>
                  <span class="mx-3">Companies Dashboard</span>
               </a>
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="opp" href="{{ route('anuncios_dashboard') }}">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                  </svg>
                  <span class="mx-3">Opportunities Dashboard</span>
               </a>
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="app" href="{{ route('applications_dashboard') }}">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                  </svg>
                  <span class="mx-3">Applications Dashboard</span>
               </a>
               <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" value="app" href="https://dashboard.stripe.com/test/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="mx-3">Stripe</span>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-red-500 text-red-700">
                    @csrf
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    <button type="submit" class="mx-3 ">Logout</button>
                </form>
            </nav>
         </div>
         <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
               <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
               <div class="mt-4">
                  <div class="flex flex-wrap -mx-6">
                     <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/5 xl:mt-0">
                        <div class="flex items-center px-2 py-6 shadow-sm rounded-md bg-white">
                           <div class="p-3 rounded-full bg-cyan-700 bg-opacity-75">
                              <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                              </svg>
                           </div>
                           <div class="mx-5">
                              <h4 class="text-2xl font-semibold text-gray-700">{{$counter[0]}}</h4>
                              <div class="text-gray-500">Users</div>
                           </div>
                        </div>
                     </div>
                     <div class="w-full px-6 sm:w-1/2 xl:w-1/5">
                        <div class="flex items-center px-2 py-6 shadow-sm rounded-md bg-white">
                           <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                              <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                              </svg>
                           </div>
                           <div class="mx-5">
                              <h4 class="text-2xl font-semibold text-gray-700">{{ $counter[1]}}</h4>
                              <div class="text-gray-500">Candidates</div>
                           </div>
                        </div>
                     </div>
                     <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/5 sm:mt-0">
                        <div class="flex items-center px-2 py-6 shadow-sm rounded-md bg-white">
                           <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                              <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                 <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                              </svg>
                           </div>
                           <div class="mx-5">
                              <h4 class="text-2xl font-semibold text-gray-700">{{ $counter[2]}}</h4>
                              <div class="text-gray-500">Companies</div>
                           </div>
                        </div>
                     </div>
                     <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/5 xl:mt-0">
                        <div class="flex items-center px-2 py-6 shadow-sm rounded-md bg-white">
                           <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                              </svg>
                           </div>
                           <div class="mx-5">
                              <h4 class="text-2xl font-semibold text-gray-700">{{$counter[3]}}</h4>
                              <div class="text-gray-500">Opportunities</div>
                           </div>
                        </div>
                     </div>
                     <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/5 xl:mt-0">
                        <div class="flex items-center px-2 py-6 shadow-sm rounded-md bg-white">
                           <div class="p-3 rounded-full bg-red-600 bg-opacity-75">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                 <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                              </svg>
                           </div>
                           <div class="mx-5">
                              <h4 class="text-2xl font-semibold text-gray-700">{{$counter[4]}}</h4>
                              <div class="text-gray-500">Applications</div>
                           </div>
                        </div>
                     </div>
                     @yield('content')
                  </div>
               </div>
            </div>
         </main>
      </div>
      <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
   </body>
</html>