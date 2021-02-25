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
        
                <div class="card-header">Change Passwords</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('changeuserpassword') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="currentPassword"><strong>Current password:</strong></label>
                            <input type="password" id="currentPassword" name="currentPassword" class="form-control" required> 
                        </div>
                        <div class="form-group">
                            <label for="password"><strong>New password:</strong></label>
                            <input type="password" id="password" name="password" class="form-control" required> 
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword"><strong>Confirm new password:</strong></label>
                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required> 
                        </div>
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
