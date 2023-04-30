@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">Edit Permission</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Permission</li>
                    <li class="breadcrumb-item active">Edit Permission</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('permission.permissions')}}"  class="btn btn-primary ">All Permissions</a></div>
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
                <form class="row g-3" action="{{route('permission.update',Crypt::encrypt($permission->id))}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="permession_name" class="form-label">Role Name<sup class="text-danger">*</sup></label>
                        <input value="{{$permission->permession_name}}" class="form-control" type="text" name="permession_name" placeholder="Role Name">
                        @error('permession_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="is_active" class="form-label">Is Active<sup class="text-danger">*</sup></label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option selected disabled> ----  Select ----</option>
                            @if($permission->is_active == 1)
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
