@extends('layouts.app')

@section('content')
<!-- This is Sidebar -->
@include('includes.profile_sidebar')
<!-- End of Sidebar -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email"><strong>Name:</strong></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{Auth::user()->email}}"> 
                        </div>
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
