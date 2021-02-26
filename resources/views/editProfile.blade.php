@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->get('Message'))
        <div class="alert alert-success" role="alert">
            <strong>success </strong>{{session()->get('Message')}}
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

                    <form enctype="multipart/form-data" action="{!! route('profilePicture') !!}" method="post">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
                        <div class="form-group">
                            <input type="file"  id="avatar" name="avatar" class="form-control">
                            <input type="hidden"  name="_token" class="form-control" value="{{csrf_token()}}">

                        </div>
                        

                        <button class="btn btn-primary" type="submit">Upload Picture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
