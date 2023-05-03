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

    <div class="card p-3" >
        <div class="card-header" style="background-color:#093D4A;color:aliceblue;">
            <span>Course Registration History</span> <br>
            <small style="color:#F68B1E;">You Can Submit, View, Search, Update, Delete, Agree, Get Payment Detail & Slip of your registration.</small>
        </div>
        <div class="card-body mt-3">
            <div class="pb-4">
                <a href="{{route('registration.create')}}" class="btn btn-success">New Registration</a>
            </div>
            <table id="example" class="table display">
                    <thead  class="committee_style">
                        <tr>
                            <th>#</th>
                            <th>Registration Type</th>
                            <th>Session</th>
                            <th>Year</th>
                            <th>Term</th>
                            <th>Credit</th>
                            <th>Submitted At</th>
                            <th>Coordinator</th>
                            <th>Student</th>
                            <th>Provost</th>
                            <th>Head</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($registration as $reg)
                            <tr>
                                <td>{{$i=$i+1 }}</td>
                                <td>{{$reg->registration_type}}</td>
                                <td>{{$reg->enrollment_session}}</td>
                                <td>{{$reg->enrollment_year}}</td>
                                <td>{{$reg->enrollment_term}}</td>
                                <td>
                                    @if ($reg->is_completed!=5)
                                        Registration Incomplete
                                    @endif
                                </td>
                                <td>{{$reg->created_at}}</td>
                                <td>
                                    @if ($reg->is_completed!=5)
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed!=5)
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed!=5)
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed!=5)
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed<1)
                                    <a class="btn btn-dark">Complete</a>
                                    @endif
                                    <a style="margin-left: 5px;" class="btn btn-dark">view</a>
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
