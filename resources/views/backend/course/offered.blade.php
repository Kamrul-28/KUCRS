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

    <div class="card">
        <div class="card-header p-3" style="background-color:#093D4A;color:aliceblue;">
            Fetch Year & Term Wise List of Courses
        </div>
        <div class="card-body">
            <form action="{{ route('search.offered-courses')}}" method="POST">
                @csrf
                <div class="row p-3 justify-content-center">
                    <div class="col-md-3">
                        <small for="">Course Category</small>
                        <select class="form-control" name="course_type" id="course_type">
                            <option selected disabled> ------ Course Category ------ </option>
                             @foreach (course_category() as $course_category)
                                <option value="{{$course_category}}"
                                @if ($request)
                                {{ $request->course_type == $course_category ? 'selected' : '' }}
                                @endif
                                >{{$course_category}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <small for="">Year</small>
                        <select class="form-control" name="year" id="year">
                            <option selected disabled>------ Year ------ </option>
                            @foreach (year() as $year)
                                <option value="{{$year}}"
                                @if ($request)
                                {{ $request->year == $year ? 'selected' : '' }}
                                @endif>{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <small for="">Term</small>
                        <select class="form-control" name="term" id="term">
                            <option selected disabled>------ Term ------ </option>
                            @foreach (term() as $term)
                                <option value="{{$term}}"
                                @if ($request)
                                {{ $request->term == $term ? 'selected' : '' }}
                                @endif
                                >{{$term}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button id="Search" class="btn btn-primary p-2 mt-4 border"><small>Search</small></button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="card p-3" >
        <div class="card-header" style="background-color:#093D4A;color:aliceblue;">
            <span>List Of Courses Under Year and Term</span> <br>
            <small style="color:#F68B1E;">Here You Can View & Search the Offered Courses</small>
        </div>
        <div class="card-body mt-3">
            <table id="example" class="table table-striped display">
                    <thead  class="committee_style">
                        <tr>
                            <th>#</th>
                            <th>Course Code</th>
                            <th>Credit</th>
                            <th>Course Type</th>
                            <th>Course Pattern</th>
                            <th>Offered In General</th>
                            <th>Offered In Special</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($offered as $value)
                            <tr>
                                <td>{{$i=$i+1 }}</td>
                                <td>{{$value->course_code}}</td>
                                <td>{{$value->course_credit}}</td>
                                <td>{{$value->course_type}}</td>
                                <td>{{$value->course_pattern}}</td>
                                <td>
                                    @if ($value->offered_in_general == 1)
                                        Yes
                                    @else
                                        No
                                    @endif

                                </td>
                                <td>
                                    @if ($value->offered_in_special == 1)
                                        Yes
                                    @else
                                        No
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>

                </table>
        </div>
    </div>

  </main><!-- End #main -->



@endsection
