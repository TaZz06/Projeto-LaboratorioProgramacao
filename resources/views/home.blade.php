@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if($errors->any())
                    <a style="color:red">{{$errors->first()}}</a>
                    </br></br>
                    @endif
                    You are normal user.
                </div>

                <div class="card-body">
                    @include('partials.list')
                </div>

                <div class="card-body">
                    <a href="generate-pdf">PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
