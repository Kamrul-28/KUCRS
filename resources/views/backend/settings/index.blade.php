@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">System Settings</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">System Settings</li>
                </ol>
            </nav>
        </div>
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
                <form class="row g-3" action="{{route('settings.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $index->id }}">
                    <div class="col-md-6">
                        <label for="name" class="form-label">App Name<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" value="{{ $index->app_name }}" name="app_name" placeholder="Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">App_Url<sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" value="{{ $index->app_url }}" name="app_url" placeholder="Email Address" required>
                    </div>
                    <div class="col-md-6">
                        <label for="app_logo_path" class="form-label">Logo<sup class="text-danger">*</sup></label>
                        <input type="file" name="app_logo_path" id="app_logo_path" class="form-control" />
                    </div>
                    <div class="text-right">
                        <button style="float: right;" type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form><!-- End Multi Columns Form -->

              </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
