@extends('layouts.app')

    @section('content')

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="relative min-h-screen top-20 items-center justify-center sm:px-10 lg:px-20 relative items-center">
                <div class="w-full space-y-4 p-10 bg-white rounded-xl shadow-lg">
                    <div class="mb-12">
                        <h2 class="text-2xl font-medium text-gray-900 title-font">
                            {{ $anuncio->workspace }}
                        </h2>
                    </div>
                    <div class="-my-6">
                        <div class="flex flex-wrap md:flex-nowrap">
                            <div class="content w-full md:w-3/4 pr-4 leading-relaxed text-base">
                                <h2 class="py-4 text-xl text-gray-800"> Job Description </h2>
                                {!! $anuncio->job_description !!}
                                
                                <h2 class="py-4 text-xl text-gray-800"> Required Knowledge, Skills, and Abilities </h2>
                                {!! $anuncio->desired_skills !!}
                                
                                @if($anuncio->type == 'J' || $anuncio->type == 'PI')
                                    <h2 class="py-4 text-xl text-gray-800"> Estimated Salary: </h2>  
                                    {!! $anuncio->salary !!}€
                                @endif
                            </div>
                            <div class="w-full md:w-1/4 pl-4">
                                <img src="{{asset('storage/images/'.$photo->path)}}" class="max-w-full mb-4">
                                <p class="leading-relaxed text-base">
                                    <strong>Location: </strong>{{ $anuncio->city }}<br>
                                    <strong>Company: </strong>{{ $user->name }}
                                </p>
                                @auth
                                    @if(Auth::user()->type_user == 'C')
                                        <a onclick="openModal('mymodalcentered')" class="block text-center my-4 tracking-wide bg-white text-indigo-500 text-sm font-medium title-font py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase">Apply Now</a>
                                    @endif
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="block text-center my-4 tracking-wide bg-white text-indigo-500 text-sm font-medium title-font py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase">Apply Now</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <dialog id="mymodalcentered" class="bg-transparent z-0 relative w-screen h-screen">
            <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
                <form method="POST" action="{{ route('apply_anuncio', $anuncio->id) }}" enctype="multipart/form-data" class="h-screen py-52">
                    <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm relative">
                        <a class="absolute h-5 w-5 right-4 top-4" onclick="modalClose('mymodalcentered')">
                            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                        <div class="space-y-4">
                            <h2 class="text-2xl font-medium text-gray-900 title-font">{{ __('Apply for the Opportunity') }}</h2>
                            <div class="-my-6">
                                @csrf
                                <div class="flex flex-wrap md:flex-nowrap">
                                    <div class="content w-full md:w-3/4 pr-4 leading-relaxed text-base">
                                        <label for="comment" class="mb-1 text-gray-600 font-semibold">{{ __('Comment') }}</label>
                                        <textarea 
                                            id="comment" 
                                            type="comment" 
                                            class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 form-control @error('comment') is-invalid @enderror" 
                                            placeholder="Add a comment" 
                                            name="comment" 
                                            value="{{ old('comment') }}"></textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                </div>  
                                <div class="py-6">  
                                    <input type="file" name="pdf" placeholder="Choose pdf" id="pdf">
                                        @error('pdf')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div> 
                                <button class="mt-2 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Apply') }}</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </dialog>
        
        <script>
            function openModal(key) {
                document.getElementById(key).showModal(); 
                document.body.setAttribute('style', 'overflow: hidden;'); 
                document.getElementById(key).children[0].scrollTop = 0; 
                document.getElementById(key).children[0].classList.remove('opacity-0'); 
                document.getElementById(key).children[0].classList.add('opacity-100')
            }
        
            function modalClose(key) {
                document.getElementById(key).children[0].classList.remove('opacity-100');
                document.getElementById(key).children[0].classList.add('opacity-0');
                setTimeout(function () {
                    document.getElementById(key).close();
                    document.body.removeAttribute('style');
                }, 100);
            }
        </script>

    @endsection