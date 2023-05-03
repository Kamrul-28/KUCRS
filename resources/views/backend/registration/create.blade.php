@extends('dashboard')

@section('content')

  <main id="main" class="main">

    @if (session()->has('success'))
    <div class="alert alert-info" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>

    @endif
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
                        <select class="form-control" type="text" name="registration_type" >
                          <option selected disabled> ----  Select ----</option>
                          @foreach(registration_type() as $type)
                          <option value="{{$type}}"
                          @if ($request)
                              {{$type == $request->registration_type ? 'selected' : ''}}
                          @endif
                          >{{$type}}</option>
                          @endforeach
                        </select>
                        @error('discipline_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <small for="discipline_id" class="form-label">Discipline Name<sup class="text-danger">*</sup></small>
                        <select class="form-control" type="text" name="discipline_id" >
                          <option selected disabled> ----  Select ----</option>
                          @foreach($discipline as $unv)
                          <option value="{{$unv->id}}"
                            @if ($request)
                            {{$unv->id == $request->discipline_id ? 'selected' : ''}}
                            @endif
                          >{{$unv->discipline_name}}</option>
                          @endforeach
                        </select>
                        @error('discipline_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <small for="year" class="form-label">Year<sup class="text-danger">*</sup></small>
                        <select class="form-control" type="text" name="year">
                            <option selected disabled> ----  Select ----</option>
                            @foreach(year() as $year)
                            <option value="{{$year}}"
                            @if ($request)
                                {{$year == $request->year ? 'selected' : ''}}
                            @endif
                         >{{$year}}</option>
                            @endforeach
                        </select>
                        @error('year')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <small for="term" class="form-label">Term<sup class="text-danger">*</sup></small>
                        <select class="form-control" type="text" name="term">
                            <option selected disabled> ----  Select ----</option>
                            @foreach(term() as $term)
                            <option value="{{$term}}"
                            @if ($request)
                                {{$term == $request->term ? 'selected' : ''}}
                            @endif
                         >{{$term}}</option>
                            @endforeach
                        </select>
                        @error('term')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-2">
                        <small for="enrollment_session" class="form-label">Session<sup class="text-danger">*</sup></small>
                        <select class="form-control" type="text" name="enrollment_session">
                            <option selected disabled> ----  Select ----</option>
                            @foreach(customSession() as $session)
                            <option value="{{$session}}"
                            @if ($request)
                                {{$session == $request->enrollment_session ? 'selected' : ''}}
                            @endif
                         >{{$session}}</option>
                            @endforeach
                        </select>
                        @error('enrollment_session')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary mt-4" style="float: right;">Submit</button>
                    </div>
                </form><!-- End Multi Columns Form -->

              </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
