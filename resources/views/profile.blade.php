@extends('layouts.app')

@section('content')



<div class="container">
@if(session()->get('flashMessage'))
    <div class="alert alert-success" role="alert">
        <strong>success </strong>{{session()->get('flashMessage')}}
    </div>
@endif
    <div class="row justify-content-center">

<!-- This is Sidebar -->
@include('includes.profile_sidebar')
<!-- End of Sidebar -->

        <div class="col-md-9">

            <div class="card">
        
                <div class="card-header">{{Auth::user()->name}}'s Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{!! route('profileUpdate') !!}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email"><strong>Name:</strong></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{Auth::user()->email}}"> 
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
