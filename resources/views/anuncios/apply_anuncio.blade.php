@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative items-center">
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Create Announcement</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <form method="POST"  action="{{ route('insert_anuncio') }}">
                            @csrf
                            <div class="w-full flex flex-col mb-3">
                                <label for="type" class="block mb-1 text-gray-600 font-semibold">Type</label>
                                <select name="type" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required">
                                    <option value="">Announcement Type</option>
                                    <option value="I">Internship</option>
                                    <option value="PI">Paid Internship</option>
                                    <option value="J">Job</option>
                                </select>
                                <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                            </div>

                            <div class="w-full flex flex-col mb-3">
                                <label for="workspace" class="block mb-1 text-gray-600 font-semibold">{{ __('Workspace') }}</label>
                                <input 
                                id="workspace" 
                                type="workspace" 
                                name="workspace" 
                                placeholder="Workspace" 
                                class="form-control @error('workspace') is-invalid @enderror appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                value="{{ old('workspace') }}"
                                type="text" 
                                required autocomplete="workspace">
                                @error('workspace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">City</label>
                                <input placeholder="City" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" required="required" name="city" id="city">
                            </div>

                            <div class="flex-auto w-full mb-1 space-y-2">
                                <label for="job_description" class="font-semibold text-gray-600 py-2">{{ __('Job Description') }}</label>
                                <textarea 
                                    id="job_description" 
                                    type="job_description" 
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 form-control @error('job_description') is-invalid @enderror" 
                                    placeholder="Enter your company info" 
                                    name="job_description" 
                                    value="{{ old('job_description') }}" 
                                    required autocomplete="job_description"></textarea>
                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="flex-auto w-full mb-1 space-y-2">
                                <label for="desired_skills" class="font-semibold text-gray-600 py-2">{{ __('Skills Expected') }}</label>
                                <textarea 
                                    id="desired_skills" 
                                    type="desired_skills" 
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 form-control @error('desired_skills') is-invalid @enderror" 
                                    placeholder="Enter your desired worker skills" 
                                    name="desired_skills" 
                                    value="{{ old('desired_skills') }}" 
                                    required autocomplete="desired_skills"></textarea>
                                @error('desired_skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="md:flex md:flex-row md:space-x-4 w-full">
                                <div class="w-full flex flex-col mb-3">
                                    <label for="salary" class="font-semibold text-gray-600 py-2">{{ __('Salary') }}</label>
                                    <input 
                                    id="salary" 
                                    type="salary" 
                                    name="salary" 
                                    placeholder="Salary ( € )" 
                                    class="form-control @error('salary') is-invalid @enderror appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                    value="{{ old('salary') }}"
                                    type="text" 
                                    required autocomplete="salary">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">{{ __('Publish') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection