@extends('layouts.app')

    @section('content')

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="relative min-h-screen top-20 items-center justify-center sm:px-10 lg:px-20 relative items-center">
                <div class="w-full space-y-4 p-10 bg-white rounded-xl shadow-lg">
                    <form method="POST" action="{{ route('edit_candidatura', $anuncio_id) }}" enctype="multipart/form-data" class="h-screen py-8">
                        @method('PUT')
                        @csrf
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
                                            name="comment">
                                            {!! $application->comment !!}</textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                </div>  
                                <div class="py-6">  
                                    <label for="comment" class="mb-1 text-gray-600 font-semibold">{{ __('Insert here your CV') }}</label>
                                    <input type="file" name="pdf" id="pdf">
                                        @error('pdf')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                </div> 
                                <p class="leading-relaxed text-gray-900">
                                    <span class="text-gray-600">{{ $application->pdf_name }}</span>
                                </p>
                                <button class="mt-2 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Apply') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endsection