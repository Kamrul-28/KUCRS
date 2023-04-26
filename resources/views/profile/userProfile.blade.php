@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{asset('backend/assets/images/profile.jpg')}}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->name }}</h2>
              <h3>{{ Auth::user()->email }}</h3>
              {{-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> --}}
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8">Web Designer</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                </div>

                <div class="tab-pane show active fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('profile.updateProfile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          {{-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> --}}
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                          <input type="file" name="photo">
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="row mb-3">
                      <label for="student_id" class="col-md-4 col-lg-3 col-form-label">Student Id</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="student_id" type="text" class="form-control" id="student_id" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="father_name" class="col-md-4 col-lg-3 col-form-label">Father Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father_name" type="text" class="form-control" id="father_name" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="mother_name" class="col-md-4 col-lg-3 col-form-label">Mother Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother_name" type="text" class="form-control" id="mother_name" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="batch" class="col-md-4 col-lg-3 col-form-label">Batch</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="batch" type="text" class="form-control" id="batch" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="designation" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="designation" type="text" class="form-control" id="designation" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="hall" class="col-md-4 col-lg-3 col-form-label">Hall</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="hall" type="text" class="form-control" id="hall" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="hall_status" class="col-md-4 col-lg-3 col-form-label">hall_status</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="hall_status" type="text" class="form-control" id="hall_status" value="">
                            <option selected disabled>------- Select -------</option>
                            <option value="1">Residential</option>
                            <option value="2">Non-Residential</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="present_address" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="present_address" type="text" class="form-control" id="present_address" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="permanent_address" class="col-md-4 col-lg-3 col-form-label">Permanent Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="permanent_address" type="text" class="form-control" id="permanent_address" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="quata" class="col-md-4 col-lg-3 col-form-label">quata</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="quata" type="text" class="form-control" id="quata" value="">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="1">No</option>
                          <option value="2">Freedom Fighter</option>
                          <option value="3">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="religion" class="col-md-4 col-lg-3 col-form-label">Religion</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="religion" type="text" class="form-control" id="religion" value="">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="1">Islam</option>
                          <option value="2">Hindu</option>
                          <option value="3">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" type="text" class="form-control" id="gender" value="">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="mobile_no" class="col-md-4 col-lg-3 col-form-label">Mobile No</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile_no" type="text" class="form-control" id="mobile_no" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dob" type="date" class="form-control" id="dob" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="gurdian" class="col-md-4 col-lg-3 col-form-label">Gurdian</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="gurdian" type="text" class="form-control" id="gurdian" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="local_gurdian" class="col-md-4 col-lg-3 col-form-label">Local Gurdian</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="local_gurdian" type="text" class="form-control" id="local_gurdian" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="admitted_at" class="col-md-4 col-lg-3 col-form-label">Admitted At</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="admitted_at" type="date" class="form-control" id="admitted_at" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nid" class="col-md-4 col-lg-3 col-form-label">NID NO</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nid" type="text" class="form-control" id="nid" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{Auth::user()->email}}">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection