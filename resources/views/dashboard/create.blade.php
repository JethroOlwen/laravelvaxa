@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<!-- This is Sidebar -->
@include('includes.profile_sidebar')
<!-- End of Sidebar -->
        <div class="col-md-8">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card">
                <div class="card-header">Create View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('dashboard.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="job_title"><strong>Job Title:</strong></label>
                        <input type="text" class="form-control" name="job_title" id="job_title">
                    </div>
                    <div class="form-group">
                        <label for="slug"><strong>Slug:</strong></label>
                        <input type="text" class="form-control" name="slug" id="slug"> 
                    </div>
                    <div class="form-group">
                        <label for="job_type"><strong>Job Type:</strong></label>
                        <input type="text" class="form-control" name="job_type" id="job_type">
                    </div>
                    <div class="form-group">
                        <label for="salary"><strong>Salary:</strong></label>
                        <input type="text" class="form-control" name="salary" id="salary">
                    </div>

                    <div class="form-group">
                        <label for="job_description"><strong>Job Description:</strong></label>
                        <textarea row="10" class="form-control" id="job_description" name="job_description"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection