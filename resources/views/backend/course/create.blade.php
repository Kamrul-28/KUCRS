@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">Create New Course</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Course</li>
                    <li class="breadcrumb-item active">Create Course</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('course.courses')}}"  class="btn btn-primary ">All Courses</a></div>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-3" action="{{route('course.store')}}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <label for="course_title" class="form-label">Course Title<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="course_title" placeholder="Course Title" required>
                        @error('course_title')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="course_code" class="form-label">Course Code<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="course_code" placeholder="Course Code">
                        @error('course_code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="course_credit" class="form-label">Credit Houres<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="course_credit" placeholder="Credit Houres">
                        @error('course_credit')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="discipline_id" class="form-label">Discipline Name<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="discipline_id" >
                          <option selected disabled> ----  Select ----</option>
                          @foreach($discipline as $unv)
                          <option value="{{$unv->id}}">{{$unv->discipline_name}}</option>
                          @endforeach
                        </select>
                        @error('discipline_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="year" class="form-label">Year<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="year">
                            <option selected disabled> ----  Select ----</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                        </select>
                        @error('year')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="term" class="form-label">Term<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="term">
                            <option selected disabled> ----  Select ----</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                        </select>
                        @error('term')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="is_active" class="form-label">Is Offered<sup class="text-danger">*</sup></label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option selected disabled> ----  Select ----</option>
                            <option value="1">Offered</option>
                            <option value="0">Not Offered</option>
                        </select>
                        @error('is_active')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="course_type">Course Type <sup class="text-danger">*</sup></label>
                        <select class="form-control" name="course_type" id="course_type">
                            <option selected disabled> ------ Course Type ------ </option>
                             @foreach (course_category() as $course_category)
                                <option value="{{$course_category}}">{{$course_category}}</option>
                            @endforeach
                        </select>
                        @error('course_type')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Course Pattern <sup class="text-danger">*</sup></label>
                        <select class="form-control" name="course_pattern" id="course_pattern">
                            <option selected disabled>------ Course Pattern ------ </option>
                            @foreach (course_pattern() as $course_pattern)
                                <option value="{{$course_pattern}}">{{$course_pattern}}</option>
                            @endforeach
                        </select>
                        @error('course_pattern')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Is Offered In General ? <sup class="text-danger">*</sup></label>
                        <select class="form-control" name="offered_in_general" id="offered_in_general">
                            <option selected disabled>------ Is Offered In General ------ </option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('offered_in_general')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="">Is Offered In Special ? <sup class="text-danger">*</sup></label>
                        <select class="form-control" name="offered_in_special" id="offered_in_special">
                            <option selected disabled>------ Is Offered In Special ------ </option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('offered_in_special')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="teacher_id" class="form-label">Teacher<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="teacher_id[]" multiple>
                          @foreach($teachers as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('teacher_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <div for="description" class="form-label">Description</div>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <div for="sec_a_syllabus" class="form-label">Section A Syllabus</div>
                        <textarea name="sec_a_syllabus" id="sec_a_syllabus" cols="30" rows="10"></textarea>
                        @error('sec_a_syllabus')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <div for="sec_b_syllabus" class="form-label">Section B Syllabus</div>
                        <textarea name="sec_b_syllabus" id="sec_b_syllabus" cols="30" rows="10"></textarea>
                        @error('sec_b_syllabus')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="text-right">
                        <button style="float: right;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End Multi Columns Form -->

              </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
