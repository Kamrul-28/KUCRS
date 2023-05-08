@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="background-color:#093D4A;color:aliceblue;">
                <span>Course Registration Form</span> <br>
                <small style="color:#F68B1E;">Submit new course registration request by selecting the following fields respectively.</small>
            </div>
            <div class="card-body px-5 pt-3 pb-5">
                <!-- Multi Columns Form -->
                <form class="row g-3" action="{{route('registration.store')}}" method="POST">
                    @csrf
                    <div class="col-md-2">
                        <small for="registration_type" class="form-label">Registration Type<sup class="text-danger">*</sup></small>
                        <div class="p-2 border">{{$registration->registration_type}}</div>
                    </div>
                    <div class="col-md-3">
                        <small for="discipline_id" class="form-label">Discipline Name<sup class="text-danger">*</sup></small>
                        <div class="p-2 border">{{$registration->discipline_name}}</div>
                    </div>
                    <div class="col-md-2">
                        <small for="year" class="form-label">Year<sup class="text-danger">*</sup></small>
                        <div class="p-2 border">{{$registration->enrollment_year}}</div>
                    </div>
                    <div class="col-md-2">
                        <small for="term" class="form-label">Term<sup class="text-danger">*</sup></small>
                        <div class="p-2 border">{{$registration->enrollment_term}}</div>
                    </div>
                    <div class="col-md-2">
                        <small for="enrollment_session" class="form-label">Session<sup class="text-danger">*</sup></small>
                        <div class="p-2 border">{{$registration->enrollment_session}}</div>
                    </div>
                </form><!-- End Multi Columns Form -->
              </div>
          </div>

        </div>
      </div>

      @if (session()->has('update'))
      <div class="alert alert-info" role="alert">
        <strong>{{session()->get('update')}}</strong>
      </div>
      @endif

      @if (session()->has('fail'))
      <div class="alert alert-danger" role="alert">
        <strong>{{session()->get('fail')}}</strong>
      </div>
      @endif
      @if (session()->has('success'))
      <div class="alert alert-info" role="alert">
        <strong>{{session()->get('success')}}</strong>
      </div>
      @endif

      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#093D4A;color:aliceblue;">
                    <span>Registered Courses</span> <br>
                    <small style="color:#F68B1E;">You Can Add and Remove Course</small>
                </div>
                <div class="card-body mt-4">
                    @if($registration->is_completed < 1)
                        <form action="{{ route('registration.add-registered-course',Crypt::encrypt($registration->id)) }}" method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">

                                        <select type="text" class="form-control" name="registered_course">
                                            <option selected disabled> ------ Select Course ------- </option>
                                            @foreach ($courses as $item)
                                                <option value="{{$item->id}}">{{$item->course_code}} - {{$item->course_title}}</option>
                                            @endforeach
                                        </select>
                                        @error('registered_course')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success"> + Add</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>Course No</th>
                                <th>Course Title</th>
                                <th>Credit</th>
                                <th>Pattern</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($registered_courses as $registered_course)
                            <tr>
                                <td>{{ $i=$i+1; }}</td>
                                <td>{{$registered_course->course_code}}</td>
                                <td>{{$registered_course->course_title}}</td>
                                <td>{{$registered_course->course_credit}}</td>
                                <td>{{$registered_course->course_pattern}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($registration->is_completed < 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-3" style="float: right;">
                                <span>Please Check Your Courses Carefully.</span> <br>
                                <small style="color:#292726;">You Can Complete Your Rejistration with one click</small><br>
                                <a href="{{ route('registration.complete-registration',Crypt::encrypt($registration->id)) }}" class="btn btn-warning mt-3"><i class="fa-solid fa-paper-plane"></i> Complete Registration</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
