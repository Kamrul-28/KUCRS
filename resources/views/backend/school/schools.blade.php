@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">All School</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item">School</li>
                <li class="breadcrumb-item active">All Schools</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('school.create') }}"  class="btn btn-primary ">Add New School</a></div>
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
                <h5 class="card-title">School List</h5>
                <!-- Table with stripped rows -->
                <table id="example" class="table table-striped display">
                    <thead  class="committee_style">
                    <tr >
                        <th>S.N</th>
                        <th>School Name</th>
                        <th>University Name</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                     <tbody>
                    @php $i=0; @endphp
                    @foreach ($schools as $data)
                        <tr>

                            <td>{{$i=$i+1 }}</td>
                            <td>{{$data->school_name}}</td>
                            <td>{{$data->university_name}}</td>
                            @if($data->is_active == 1)
                            <td>Active</td>
                            @else
                            <td>Not Active</td>
                            @endif
                            <td class="text-center">
                                <a href="{{route('school.edit',encrypt($data->id))}}" class="btn btn-primary" ><i class="ri-edit-2-line"></i></a>
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
