@extends('dashboard')

@section('content')

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between">
        <div>
            <h1 class="mb-2">Edit Discipline</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Discipline</li>
                    <li class="breadcrumb-item active">Edit Discipline</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('discipline.disciplines')}}"  class="btn btn-primary ">All Disciplines</a></div>
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
                <form class="row g-3" action="{{route('discipline.update',encrypt($discipline->id))}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="school_id" class="form-label">School Name<sup class="text-danger">*</sup></label>
                        <select class="form-control" type="text" name="school_id" >
                          <option selected disabled> ----  Select ----</option>
                          @foreach($school as $unv)
                            @if($unv->id == $discipline->school_id)
                                <option value="{{$unv->id}}" selected>{{$unv->school_name}}</option>
                            @else
                                <option value="{{$unv->id}}">{{$unv->school_name}}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('school_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="discipline_name" class="form-label">Discipline Name<sup class="text-danger">*</sup></label>
                        <input class="form-control" value="{{$discipline->discipline_name}}" type="text" name="discipline_name" placeholder="Discipline Name">
                        @error('discipline_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="is_active" class="form-label">Is Active<sup class="text-danger">*</sup></label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option selected disabled> ----  Select ----</option>
                            @if($discipline->is_active == 1)
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
