@extends('dashboard')

@section('content')

@php $overview = $user->first() @endphp
@php 
$userDetails = App\Models\User::join('roles','roles.id','=','users.role_id')
->where('users.id',Auth::user()->id)
->select('users.*','roles.role_name')
->first() 
@endphp

  <main id="main" class="main">
    @if(Session::has('warning'))
      <p class="alert alert-warning">{{ Session::get('warning') }}</p>
    @endif
    <div class="card p-3">
      <div class="row">
        <div class="col-md-1">
            {{-- <img src="{{asset('global_assets/images/welcome.jpg')}}" height="100px;" width="100px"> --}}
            @if ($user->first()->photo != null)
            <img height="50px;" width="50px;" src="{{ $user->first()->photo }}" alt="Profile" class="rounded-circle">
            @else
            <img height="50px;" width="50px;" src="{{asset('backend/assets/images/profile.jpg')}}" alt="Profile" class="rounded-circle">
            @endif
        </div>
        <div class="col-md-6">
            <div class="pancakes-text"
              style="font-family: Satisfy, cursive;font-size: 20px;color: #093D4A;text-shadow: 0.02em 0.02em 0 #E8EDF7;
              ">
              Welcome {{$userDetails->role_name}} of Khulna University
            </div> 
        </div>
        <div class="col-md-4 text-right">
            <span style="font-family: Satisfy, cursive;font-size: 20px;color: #093D4A;text-shadow: 0.02em 0.02em 0 #E8EDF7;
            ">{{Auth::user()->name}}</span> 
        </div>
      </div>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
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
                @if ($user->first()->about == null)
                    <div class="tab-pane fade profile-overview" id="profile-overview">
                        <div class="alert alert-warning">
                            Please Update Your Profile for Overview . Click to Edit Profile.
                        </div>
                    </div>
                @else
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">{{$overview->about}}</p>

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8">{{$overview->name}}</div>
                    </div>
                    @if ($role_id == 3)
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Designation</div>
                      <div class="col-lg-9 col-md-8">{{$overview->designation}}</div>
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Father's Name</div>
                      <div class="col-lg-9 col-md-8">{{$overview->father_name}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Mother's Name</div>
                      <div class="col-lg-9 col-md-8">{{$overview->mother_name}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Present Address</div>
                      <div class="col-lg-9 col-md-8">{{$overview->present_address}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Permanent Address</div>
                      <div class="col-lg-9 col-md-8">{{$overview->permanent_address}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8">{{$overview->mobile_no}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{$overview->email}}</div>
                    </div>
                    @if ($role_id == 4)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Student Id</div>
                        <div class="col-lg-9 col-md-8">{{$overview->student_id}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Batch</div>
                        <div class="col-lg-9 col-md-8">{{$overview->batch}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Admitted At</div>
                        <div class="col-lg-9 col-md-8">{{$overview->admitted_at}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Hall</div>
                      <div class="col-lg-9 col-md-8">{{$overview->hall}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Hall Status</div>
                      <div class="col-lg-9 col-md-8">{{$overview->hall_status}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Quata</div>
                      <div class="col-lg-9 col-md-8">{{$overview->quata}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Gurdian</div>
                        <div class="col-lg-9 col-md-8">{{$overview->gurdian}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Local Gurdian</div>
                        <div class="col-lg-9 col-md-8">{{$overview->local_gurdian}}</div>
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Religion</div>
                      <div class="col-lg-9 col-md-8">{{$overview->religion}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Gender</div>
                      <div class="col-lg-9 col-md-8">{{$overview->gender}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                      <div class="col-lg-9 col-md-8">{{$overview->dob}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">NID NO</div>
                      <div class="col-lg-9 col-md-8">{{$overview->nid}}</div>
                    </div>


                  </div>
                @endif

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('profile.updateProfile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                          <input type="file" name="photo">
                          {{-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> --}}
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="father_name" class="col-md-4 col-lg-3 col-form-label">Father Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father_name" type="text" class="form-control" id="father_name" value="{{$overview->father_name}}">
                        @error('father_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="mother_name" class="col-md-4 col-lg-3 col-form-label">Mother Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother_name" type="text" class="form-control" id="mother_name" value="{{$overview->mother_name}}">
                        @error('mother_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">{{$overview->about}}</textarea>
                        @error('about')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    @if ($role_id == 3)
                    <div class="row mb-3">
                        <label for="designation" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="designation" type="text" class="form-control" id="designation" value="{{$overview->designation}}">
                          @error('designation')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    @endif

                    <div class="row mb-3">
                        <label for="present_address" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="present_address" type="text" class="form-control" id="present_address" value="{{$overview->present_address}}">
                          @error('present_address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="permanent_address" class="col-md-4 col-lg-3 col-form-label">Permanent Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="permanent_address" type="text" class="form-control" id="permanent_address" value="{{$overview->permanent_address}}">
                          @error('permanent_address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    @if ($role_id == 4)
                    <div class="row mb-3">
                        <label for="student_id" class="col-md-4 col-lg-3 col-form-label">Student Id</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="student_id" type="text" class="form-control" id="student_id" value="{{$overview->student_id}}">
                          @error('student_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="batch" class="col-md-4 col-lg-3 col-form-label">Batch</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="batch" type="text" class="form-control" id="batch" value="{{$overview->batch}}">
                        @error('batch')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="hall" class="col-md-4 col-lg-3 col-form-label">Hall</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="hall" type="text" class="form-control" id="hall" value="{{$overview->hall}}">
                        @error('hall')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="hall_status" class="col-md-4 col-lg-3 col-form-label">hall_status</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="hall_status" type="text" class="form-control" id="hall_status" value="{{$overview->hall_status}}">
                            <option selected disabled>------- Select -------</option>
                            <option value="Residential">Residential</option>
                            <option value="Non-Residential">Non-Residential</option>
                        </select>
                        @error('hall_status')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="quata" class="col-md-4 col-lg-3 col-form-label">quata</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="quata" type="text" class="form-control" id="quata">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="No">No</option>
                          <option value="Freedom Fighter">Freedom Fighter</option>
                          <option value="Others">Others</option>
                        </select>
                        @error('quata')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gurdian" class="col-md-4 col-lg-3 col-form-label">Gurdian</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="gurdian" type="text" class="form-control" id="gurdian" value="{{$overview->gurdian}}">
                          @error('gurdian')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="local_gurdian" class="col-md-4 col-lg-3 col-form-label">Local Gurdian</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="local_gurdian" type="text" class="form-control" id="local_gurdian" value="{{$overview->local_gurdian}}">
                            @error('local_gurdian')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="admitted_at" class="col-md-4 col-lg-3 col-form-label">Admitted At</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="admitted_at" type="date" class="form-control" id="admitted_at" value="{{$overview->admitted_at}}">
                          @error('admitted_at')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                      <label for="religion" class="col-md-4 col-lg-3 col-form-label">Religion</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="religion" type="text" class="form-control" id="religion" value="">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="Islam">Islam</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Others">Others</option>
                        </select>
                        @error('religion')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" type="text" class="form-control" id="gender" value="">
                          <option selected disabled> -------- Select -------- </option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        @error('gender')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="mobile_no" class="col-md-4 col-lg-3 col-form-label">Mobile No</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile_no" type="text" class="form-control" id="mobile_no" value="{{$overview->mobile_no}}">
                        @error('mobile_no')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dob" type="date" class="form-control" id="dob" value="{{$overview->dob}}">
                        @error('dob')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nid" class="col-md-4 col-lg-3 col-form-label">NID NO</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nid" type="text" class="form-control" id="nid" value="{{$overview->nid}}">
                        @error('nid')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{Auth::user()->email}}">
                        @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                      </div>
                    </div> --}}
                    <div class="text-center">
                      <button type="submit" class="btn btn-warning float-right">Update Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <x-app-layout>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <!-- Change Password Form -->
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div>
                                    <x-input-label for="current_password" :value="__('Current Password')" />
                                    <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password" :value="__('New Password')" />
                                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Update') }}</x-primary-button>

                                    @if (session('status') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </x-app-layout>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if ($user->first()->photo != null)
                 <img src="{{ $user->first()->photo }}" alt="Profile" class="rounded-circle">
                @else
                 <img src="{{asset('backend/assets/images/profile.jpg')}}" alt="Profile" class="rounded-circle">
                @endif

              <h3>{{ $userDetails->role_name }}</h3>
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
      </div>
    </section>

  </main><!-- End #main -->

@endsection
