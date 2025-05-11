@extends('base.base')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if(Auth::user()->photo) <!-- Check if there's a photo -->
            <img src="{{ asset('storage/'. Auth::user()->photo ) }}" alt="Profile" class="rounded-circle">
            @else
            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            @endif
            <h2>{{ Auth::user()->name }}</h2>
            <h3>
    <span class="badge bg-primary"> {{ Auth::user()->role }} </span>
</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <!-- Overview Tab -->
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">{{ Auth::user()->about ?? 'No bio available.' }}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8">@foreach(Auth::user()->getRoleNames() as $role)
    <span class="">{{ $role }}</span>
@endforeach
</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->phone ?? 'Not set' }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->country ?? 'Not set' }}</div>
                </div>

              </div>

              <!-- Edit Profile Tab -->
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif


                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      @if(Auth::user()->photo) <!-- Check if there's a photo -->
                      <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile" class="img-thumbnail" style="max-width: 150px;">
                      @else
                      <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile picture" class="img-thumbnail" style="max-width: 150px;">
                      @endif
                      <div class="pt-2">
                        <input type="file" name="photo" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="text" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <!-- Change Password Tab -->
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <form method="POST" action="{{ route('password.edit') }}">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                    <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" class="form-control" name="current_password" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" class="form-control" name="new_password" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" class="form-control" name="new_password_confirmation" required>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
              </div>

            </div><!-- End tab content -->
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection