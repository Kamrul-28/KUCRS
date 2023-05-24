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
                    <span>Registered Students</span> <br>
                    <small style="color:#F68B1E;">You Can Give and Modify Marks</small>
                </div>
                <div class="card-body mt-4">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>view/Give Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($registration as $registered_course)
                                    <tr>
                                        <td>{{ $i=$i+1 }}</td>
                                        <td>{{$registered_course->student_id}}</td>
                                        <td>{{$registered_course->name}}</td>
                                        <td><a href="{{ route('mark.generate',Crypt::encrypt($registered_course->reg_id)) }}" class="btn btn-primary">view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
