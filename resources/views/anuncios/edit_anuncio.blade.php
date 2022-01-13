@extends('layouts.app')

@section('content')
    @include('layouts.alert')
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="relative min-h-screen top-20 items-center justify-center sm:px-10 lg:px-20 relative items-center">
            <div class="w-full space-y-4 p-10 bg-white rounded-xl shadow-lg">
                <form method="POST" action="{{ route('edit_anuncio', $anuncio->id)}}" enctype="multipart/form-data" class="py-8">
                    @method('PUT')
                    @csrf
                    <div class="mb-12">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="w-full flex flex-col mb-3">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Type</span>
                                </div>
                                    <select 
                                    id="select_anuncio_type" 
                                    name="type" 
                                    onclick="selected_option();"
                                    class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full " 
                                    required="required">
                                    @if($anuncio->type == 'J')
                                        <option value="{{ $anuncio->type }}">Job</option>
                                        <option value="I">Internship</option>
                                        <option value="PI">Paid Internship</option>
                                    @endif
                                    @if($anuncio->type == 'PI')
                                        <option value="{{ $anuncio->type }}">Paid Internship</option>
                                        <option value="I">Internship</option>
                                        <option value="J">Job</option>
                                    @endif
                                    </select>
                                    <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Workspace</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <textarea 
                                        id="workspace" 
                                        type="text" 
                                        class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('workspace') is-invalid @enderror" 
                                        name="workspace" 
                                        required="workspace"
                                        autocomplete="workspace">{{ $anuncio->workspace }}</textarea>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Location</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                    <input id="city" type="text" class="form-control bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="city" value="{!! $anuncio->city !!}" required autocomplete="city">
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Job description</span>
                                </div>  
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <textarea 
                                        id="job_description" 
                                        type="text" 
                                        class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('job_description') is-invalid @enderror" 
                                        name="job_description" 
                                        required="job_description"
                                        autocomplete="job_description">{!! nl2br($anuncio->job_description) !!}</textarea>
                                    </li>
                                </ul>
                            </div>
                            @if($anuncio->type == 'J' || $anuncio->type == 'PI')
                            <div id="salary">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Salary</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                    <input id="salary_input" type="text" class="form-control bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" name="salary" value="{!! $anuncio->salary !!}€" autocomplete="salary">
                                    </li>
                                </ul>
                            </div>
                            @endif
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    </span>
                                    <span class="tracking-wide">Desired skills</span>
                                </div>  
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <textarea 
                                        id="desired_skills" 
                                        type="text" 
                                        class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('desired_skills') is-invalid @enderror" 
                                        name="desired_skills" 
                                        required="desired_skills"
                                        autocomplete="desired_skills">{!! nl2br($anuncio->desired_skills) !!}</textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        function selected_option() {
            var select = document.getElementById("select_anuncio_type");
            var selected = select.value;
            var salary_div = document.getElementById("salary");
            var salary_input = document.getElementById("salary_input");
            if(selected == 'I' || selected == 'none'){
                salary_input.value = '0';
                if (salary_div.classList.contains("invisible") == false) {
                    salary_div.classList.add("invisible");
                }
            }else{
                salary_input.value = ' ';
                salary_div.classList.remove("invisible");
            }
        }
    </script> 
@endsection