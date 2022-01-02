@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    
                    You are normal user.
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p>{{$errors->first()}}</p>
                        </div>
                        </br></br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
