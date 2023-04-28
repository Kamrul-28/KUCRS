@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">Create New User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('user.allUser')}}"  class="btn btn-primary ">All Users</a></div>
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
                <form class="row g-3" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role<sup class="text-danger">*</sup></label>
                        <select id="role" name="role_id" required class="form-control">
                            <option disabled> ----  Select ----</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password<sup class="text-danger">*</sup></label>
                        <input type="password" name="password" id="password" required class="form-control" />
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
