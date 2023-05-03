    <div class="card p-3">
      <div class="row">
        <div class="col-md-1">
            {{-- <img src="{{asset('global_assets/images/welcome.jpg')}}" height="100px;" width="100px"> --}}
            @if ($user->first()->photo != null)
            <img height="50px;" width="50px;" src="{{ $user->first()->photo }}" alt="Profile" class="rounded-circle">
            @else
            <img height="50px;" width="50px;" src="{{asset('backend/assets/images/profile.jpg')}}" alt="Profile" class="rounded-circle">
            @endif
        </div>
        <div class="col-md-6">
            <div class="pancakes-text"
              style="font-family: Satisfy, cursive;font-size: 20px;color: #093D4A;text-shadow: 0.02em 0.02em 0 #E8EDF7;
              ">
              Welcome {{$userDetails->role_name}} of Khulna University
            </div> 
        </div>
        <div class="col-md-4 text-right">
            <span style="font-family: Satisfy, cursive;font-size: 20px;color: #093D4A;text-shadow: 0.02em 0.02em 0 #E8EDF7;
            ">{{Auth::user()->name}}</span> 
        </div>
      </div>
      
    </div><!-- End Page Title -->