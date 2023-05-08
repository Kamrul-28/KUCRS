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
                            <th>status</th>
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
                                    @if ($reg->is_completed<1)
                                        Registration Incomplete
                                    @else
                                        {{$reg->enrolled_credit}}
                                    @endif
                                </td>
                                <td>{{$reg->created_at}}</td>
                                <td>
                                    @if ($reg->is_completed>=2)
                                    Approved
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed>=3)
                                    Approved
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed>=5)
                                    Approved
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed>=6)
                                    Approved
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($reg->is_completed<1)
                                    <a href="{{route('registration.complete',Crypt::encrypt($reg->id))}}" class="btn btn-dark">Complete</a>
                                    @elseif ($reg->is_completed==1)
                                        @if (Auth::user()->role_id==3)
                                        <a href="{{route('registration.complete-registration-payment',Crypt::encrypt($reg->id))}}" class="btn btn-primary">Approve</a>
                                        @else
                                        Waiting For Coordinator Approval
                                        @endif
                                    @elseif ($reg->is_completed==2)
                                        @if (Auth::user()->role_id==4)
                                        <a href="{{route('registration.complete-registration-payment',Crypt::encrypt($reg->id))}}" class="btn btn-primary">Approve</a>
                                        @else
                                        Waiting For Student Approval
                                        @endif
                                    @elseif($reg->is_completed==3)
                                    <a href="{{route('registration.pay',Crypt::encrypt($reg->id))}}" class="btn btn-primary">Pay Now</a>
                                    @elseif($reg->is_completed==4)
                                        @if (Auth::user()->role_id==3)
                                        <a href="{{route('registration.complete-registration-payment',Crypt::encrypt($reg->id))}}" class="btn btn-primary">Approve</a>
                                        @else
                                        Waiting For Hall Approval
                                        @endif
                                    @elseif($reg->is_completed==5)
                                        @if (Auth::user()->role_id==3)
                                        <a href="{{route('registration.complete-registration-payment',Crypt::encrypt($reg->id))}}" class="btn btn-primary">Approve</a>
                                        @else
                                        Waiting For Head Approval
                                        @endif
                                    @elseif($reg->is_completed==6)

                                        Registration Completed

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('registration.complete',Crypt::encrypt($reg->id))}}" style="margin-left: 5px;" class="btn btn-dark">view</a>
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
