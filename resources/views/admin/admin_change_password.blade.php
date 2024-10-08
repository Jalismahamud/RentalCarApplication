@extends('admin.admin_dashboard')

@section('admin')
    <h3>admin profile</h3>

    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($profile->photo) ? asset('uploads/admin_images/' . $profile->photo) : asset('uploads/admin_images/no_image.jpg') }}"
                                    alt="profile" />
                            </div>
                            <h6 class="card-title mb-0">Hi , {{ $profile->name }}</h6>

                        </div>
                        <p>
                            what's up {{ $profile->name }} . Here you can see your profile.
                        </p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
                            <p class="text-muted">{{ $profile->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">UserName</label>
                            <p class="text-muted">{{ $profile->username }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">UserEmail</label>
                            <p class="text-muted">{{ $profile->email }}</p>
                        </div>
                        <div class="mt-3">t-
                            <label class="tx-11 fw-bolder mb-0 texuppercase">Phone</label>
                            <p class="text-muted">{{ $profile->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                            <p class="text-muted">{{ $profile->address }}</p>
                        </div>


                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Change Your Password</h6>

                            <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data"
                                class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Old Password</label>
                                    <input type="password" name="old_password" class="form-control"
                                        @error('old_password')
                                      is-invalid @enderror
                                        id="old_password" autocomplete="off">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control"
                                        @error('new_password')
                                      is-invalid @enderror
                                        id="new_password" autocomplete="off">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        id="new_password_confirmation" autocomplete="off">
                                 
                                </div>




                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
