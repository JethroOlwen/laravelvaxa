@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<!-- This is Sidebar -->
@include('includes.profile_sidebar')
<!-- End of Sidebar -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Display the specified resource</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection