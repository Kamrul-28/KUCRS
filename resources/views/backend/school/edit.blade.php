@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">Edit School</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">School</li>
                    <li class="breadcrumb-item active">Edit School</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('school.schools')}}"  class="btn btn-primary ">All Schools</a></div>
    </div><!-- End Page Title -->

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
    <section class="section">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-5">
                <!-- Multi Columns Form -->
                <form class="row g-3" action="{{route('school.update',encrypt($school->id))}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="university_id" class="form-label">Select University<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="university_id" >
                          <option selected disabled> ----  Select ----</option>
                          @foreach($university as $unv)
                            @if($unv->id == $school->university_id)
                            <option selected value="{{$unv->id}}">{{$unv->university_name}}</option>
                            @else
                                <option value="{{$unv->id}}">{{$unv->university_name}}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('university_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="school_name" class="form-label">School Name<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="school_name" value="{{$school->school_name}}" placeholder="School Name">
                        @error('school_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="is_active" class="form-label">Is Active<sup class="text-danger">*</sup></label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option selected disabled> ----  Select ----</option>
                            @if($school->is_active == 1)
                            <option value="1" selected>Active</option>
                            <option value="0">Not Active</option>
                            @else
                            <option value="1" >Active</option>
                            <option value="0" selected>Not Active</option>
                            @endif

                        </select>
                        @error('is_active')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="text-right">
                        <button style="float: right;" type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form><!-- End Multi Columns Form -->

              </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
