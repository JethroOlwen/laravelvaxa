<!-- This is Sidebar -->

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Profile Picture</div>
                <img src="img/avatar/{{Auth::user()->avatar}}" alt="Profile Picture" style="align:center;max-height: 200px; max-width:200px;object-position: center; object-fit: none;border-radius:50%;overflow: hidden;">
            </div>
            <div class="card">
                <div class="card-header">Sidebar</div>
                <a href="{!! route('home') !!}" class="btn btn-primary btn-block">Dashboard</a>
                <a href="{!! route('profile') !!}" class="btn btn-primary btn-block">Profile setting</a>
                <a href="{!! route('changeuserpassword') !!}" class="btn btn-primary btn-block">Change Password</a>
                <a href="{!! route('profilePicture') !!}" class="btn btn-primary btn-block">Profile Picture</a>
            </div>
        </div>
<!-- End of Sidebar -->