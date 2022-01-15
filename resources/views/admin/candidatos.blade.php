@extends('layouts.admin_home')

@section('content')
    <div class="flex flex-col w-full mt-8 -my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        @include('layouts.alert')
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <h3 class="pl-5 text-gray-700 text2xl font-medium">Candidates Dashboard</h3>
            <table class="min-w-full">
                <caption>Candidatos Table:</caption>
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Name</th>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Profissional area</th>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Schooling</th>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Professional_experience</th>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Skills</th>
                        <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody id="candidatosDashboard"class="bg-white">
                    @foreach($infos as $info)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    @if($info->photo_id)
                                        <img alt="userImage" src="{{asset('storage/images/'.$info->path)}}" class="w-10 h-10 rounded-full object-cover">
                                    @endif

                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$info->name}}
                                        </div>
                                        <div class="text-sm leading-5 text-gray-500">{{$info->email}}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$info->profissional_area}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$info->schooling}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$info->professional_experience}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$info->skills}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <form action="{{ route('remove_candidato', $info->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="text-red-600 hover:text-red-900" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection