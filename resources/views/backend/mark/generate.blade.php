@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <section class="section">
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
                    <span>Registered Courses of {{$user->name}} ({{$user->student_id}})</span> <br>
                    <small style="color:#F68B1E;">You can Enter or view marks</small>
                </div>
                <div class="card-body mt-4">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <form action="{{ route('mark.store')}}" method="POST">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Attendance (10)</th>
                                            <th>CT-1 (30)</th>
                                            <th>CT-2 (30)</th>
                                            <th>CT-3 (30)</th>
                                            <th>Term-Sec A (30)</th>
                                            <th>Term-Sec B (30)<input type="hidden" value="{{$registered_courses}}" name="registered_courses"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($registered_courses as $registered)
                                        <tr>
                                            <td>{{ $i=$i+1 }}</td>
                                            <td>{{$registered->course_code}}</td>
                                            <td>{{$registered->course_title}}</td>
                                            <td><input type="number" step="0.5" min="0" max="10" class="form-control" name="attendance[]" placeholder="Attendance mark"></td>
                                            <td>
                                                <input type="hidden" value="{{$registered->cid}}" name="cid[]">
                                                <input type="hidden" value="{{$registration_id}}" name="registration_id">
                                                <input type="number" step="0.5" min="0" max="30" class="form-control" name="ct1[]" placeholder="ct 1 mark">
                                            </td>
                                            <td><input type="number" step="0.5" min="0" max="30" class="form-control" name="ct2[]" placeholder="ct 2 mark"></td>
                                            <td><input type="number" step="0.5" min="0" max="30" class="form-control" name="ct3[]" placeholder="ct 3 mark"></td>
                                            <td><input type="number" step="0.5" min="0" max="30" class="form-control" name="secA[]" placeholder="sec A mark"></td>
                                            <td><input type="number" step="0.5" min="0" max="30" class="form-control" name="secB[]" placeholder="sec B mark"></td>
                                            {{-- <td><a href="{{ route('mark.generate',Crypt::encrypt($registered->reg_id)) }}" class="btn btn-primary">view</a></td>
                                        --}}</tr> 
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8"> 
                                                <p class="mt-3">Please Check Marks very carefully</p> 
                                                <p style="color:#F68B1E;">You can Edit Markes Later</p> 
                                                <button type="submit" class="btn btn-primary mt-2">Submit Marks</button> 
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
