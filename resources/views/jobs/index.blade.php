
@extends('layouts.master')
@section('descriptions','Descriptions for the Quotes Homepage, Quotes Homepage')
@section('pagetitles','Home')
@section('content')
   
    <!-- END Site header -->
    <!-- Main container -->
    <main>
      <!-- Recent jobs -->
      <section>
        <div class="container">
          <header class="section-header">
            <h2>Recent Jobs</h2>
          </header>
          @auth()
            @component('components.alert')
              @slot('alertType')
                success
              @endslot
              @slot('alertText')
                Welcome to the Homepage
              @endslot
            @endcomponent
          @endauth()
          @guest
            @component('components.alert')
              @slot('alertType')
                danger
              @endslot
              @slot('alertText')
                You're not welcomed to the Homepage
              @endslot
            @endcomponent
          @endguest
          <div class="row jobs-details">
            <!-- START JOB DETAILS -->
            @foreach($jobs as $key => $job)
              <div class="col-xs-12">
              <div class="jobs-block">
                <header>
                  <img src="/img/avatar/{{$job->client->avatar}}" alt="" style="max-width:70px;max-height:70px;width:auto">
                  <a href=""></a>
                  <div class="hgroup">
                    <h4>
            <a href="{{route('jobs.show',$job->slug)}}">{{ $job->job_title }}</a>
                    </h4>
                    <div class="spacer-front"></div>
                  </div>

                </header>

               <footer>
              <div class="status"><strong>Posted: &nbsp;<i class="fa fa-clock-o"></i></strong>{{ $job->created_at->diffForHumans()}} &nbsp; By:&nbsp;<a href="author-jobs-details.html">{{ $job->client->name}}</a></div>
            
                  <div class="action-btn">
                  {{ $job->salary }}
                    <a class="btn btn-xs btn-info" href="category-details.html">{{ $job->job_type }}</a>
                  </div>
                </footer>
              </div>
            </div>
            @endforeach
          <!-- END JOB DETAILS -->
          </div>

          <br><br>
    <p class="text-center">
      <ul class="pagination" role="navigation">
      <li class="page-item disabled" aria-label="&laquo; Previous">
        <span class="page-link" aria-hidden="true">&lsaquo;</span></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">1</span></li>
         <li class="page-item">
          <a class="page-link" href="#">2</a></li>
            <li class="page-item">
              <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">
              </a>
            </li>
            </ul>

</p>

        </div>
      </section>
      <!-- END Recent jobs -->

@endsection
