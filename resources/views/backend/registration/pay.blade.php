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
            <span>Course Registration Payment</span> <br>
            <small style="color:#F68B1E;">You Can Pay, View, Search, Update, Delete, Agree, Get Payment Detail & Slip of your registration.</small>
        </div>
        <div class="card-body mt-5">
            <div class="card">
                <div class="card-header" style="color:rgb(19, 20, 20);">
                    Payment Slip
                </div>
                <div class="card-body">
                    <table class="table display">
                        <thead  class="committee_style">
                            <tr>
                                <th>#</th>
                                <th>Area</th>
                                <th>Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($all_fees as $fee)
                                <tr>
                                    <td>{{$i=$i+1 }}</td>
                                    <td>{{$fee->fee_name}}</td>
                                    <td>{{$fee->amount}}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td>{{$i=$i+1}}</td>
                                    <td>Credit Fee</td>
                                    <td>{{$credit_fee}}</td>
                                </tr>
                                <tr>
                                    <td>{{$i=$i+1}}</td>
                                    <td>Exam Fee</td>
                                    <td>{{$exam_fee}}</td>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="fw-bold text-danger">#</td>
                                <td class="fw-bold text-danger">TOTAL</td>
                                <td class="fw-bold text-danger">{{$total_fee}}</td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="p-3" style="float: right;">
                            <span>Please Check Payment Slip</span> <br>
                            <small style="color:#292726;">You Can Complete Your Payment with one click</small><br>
                            <a href="{{ route('registration.complete-registration-payment',Crypt::encrypt($registration_id)) }}" class="btn btn-primary mt-3">
                                 Pay Now</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

  </main><!-- End #main -->



@endsection
