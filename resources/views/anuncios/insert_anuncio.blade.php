@extends('layouts.app')

@section('content')
    @include('layouts.alert')
    <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative items-center">
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col relative">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h1 class="text-center text-2xl font-semibold text-gray-600">Create Announcement</h1>
                        <p class="text-neutral-500 font-bold align-baseline text-center font-sans pl-3 pt-1">(15€)</p>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <form id="payment_form" method="POST" action="{{ route('insert_anuncio') }}">
                            @csrf
                            <div class="w-full flex flex-col mb-3">
                                <label for="type" class="block mb-1 text-gray-600 font-semibold">Type</label>
                                <select 
                                id="select_anuncio_type" 
                                name="type" 
                                onclick="selected_option();"
                                class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full " 
                                required="required">
                                    <option value="none">           </option>
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
                                type="text" 
                                name="workspace" 
                                class="form-control @error('workspace') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                                value="{{ old('workspace') }}"
                                type="text" 
                                required="required"
                                autocomplete="workspace">
                                @error('workspace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-full flex flex-col mb-3">
                                <label class="block mb-1 text-gray-600 font-semibold">City</label>
                                <input 
                                class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                                type="text" 
                                required="required" 
                                name="city" 
                                id="city">
                            </div>

                            <div class="flex-auto w-full mb-1 space-y-2">
                                <label for="job_description" class="block mb-1 text-gray-600 font-semibold">{{ __('Job Description') }}</label>
                                <textarea 
                                    id="job_description" 
                                    type="text" 
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('desired_skills') is-invalid @enderror"
                                    name="job_description" 
                                    value="{{ old('job_description') }}" 
                                    required="required"
                                    autocomplete="job_description"></textarea>
                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="flex-auto w-full mb-1 space-y-2">
                                <label for="desired_skills" class="block mb-1 text-gray-600 font-semibold">{{ __('Skills Expected') }}</label>
                                <textarea 
                                    id="desired_skills" 
                                    type="text" 
                                    class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-indigo-50 px-4 py-2 outline-none rounded-md text-grey-darker border border-grey-lighter form-control @error('desired_skills') is-invalid @enderror" 
                                    name="desired_skills" 
                                    value="{{ old('desired_skills') }}" 
                                    required="required"
                                    autocomplete="desired_skills"></textarea>
                                @error('desired_skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="salary" class="invisible md:flex md:flex-row md:space-x-4 w-full">
                                <div class="w-full flex flex-col mb-3">
                                    <label for="salary" class="block mb-1 text-gray-600 font-semibold">{{ __('Salary') }}</label>
                                    <input 
                                    id="salary_input" 
                                    type="text" 
                                    name="salary"
                                    class="form-control @error('salary') is-invalid @enderror bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" 
                                    type="text">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 mx-2">
                                <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                                    <input
                                        type="checkbox"
                                        id="is_highlighted"
                                        name="is_highlighted"
                                        value="Yes"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                                    <span class="ml-2">Highlight this post (extra 20€)</span>
                                </label>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full">
                                <div id="card-element"></div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full">
                                <input type="hidden" id="payment_method_id" name="payment_method_id" value="">
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button type="sumbmit" id="form_submit" class="w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">{{ __('Publish') }}</button>
                            </div>
                            <div class="mt-2 flex">
                                <a href="{{ route('home') }}" class="text-center w-full bg-gradient-to-tr from-red-600 to-orange-600 text-indigo-100 py-2 rounded-md text-lg"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement rounded-md shadow-sm bg-white px-2 py-3 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full'
            }
        });

        cardElement.mount('#card-element');

        document.getElementById('form_submit').addEventListener('click', async (e) => {
            // prevent the submission of the form immediately
            e.preventDefault();

            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {}
            );

            if (error) {
                alert(error.message);
            } else {
                // card is ok, create payment method id and submit form
                document.getElementById('payment_method_id').value = paymentMethod.id;
                document.getElementById('payment_form').submit();
            }
        })
    
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






