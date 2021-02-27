@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<!-- This is Sidebar -->
@include('includes.profile_sidebar')
<!-- End of Sidebar -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Index View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success! </strong>{{session()->get('message')}}
        </div>
    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Job Title</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $key => $job)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $job->job_title }}</td>
                                <td>
                                    <a href="{{route('dashboard.edit',$job->id)}}" class="btn btn-primary btn-xs">Edit</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-xs" 
                                    onclick="event.preventDefault();
                                     document.getElementById('deleteJobPostForm').submit();">Delete</a>
                                </td>
                            </tr>
                         @endforeach   
                        </tbody> 
                    </table>
                    <form action="{{ route('dashboard.destroy',$job->id) }}" method="post" id="deleteJobPostForm">
                         @method('DELETE')
                         @csrf
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection