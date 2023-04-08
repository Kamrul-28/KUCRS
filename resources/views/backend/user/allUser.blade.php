@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">All User</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">All Users</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('user.create') }}"  class="btn btn-primary ">Add New User</a></div>
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
            <div class="card-body">
                <h5 class="card-title">User List</h5>
                <!-- Table with stripped rows -->
                <table id="example" class="table table-striped display">
                    <thead  class="committee_style">
                    <tr >
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=0; @endphp
                    @foreach ($users as $data)
                        <tr>

                            <td>{{$i=$i+1 }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->role_name}}</td>
                            <td class="text-center">
                                <a href="{{route('user.edit',encrypt($data->id))}}" class="btn btn-primary" ><i class="ri-edit-2-line"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        
                    </tfoot>

                </table>
                <!-- End Table with stripped rows -->

              </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
