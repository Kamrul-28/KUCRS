<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $user = User::leftJoin('user_details','user_details.user_id','=','users.id')->where('users.id',Auth::user()->id);
        return view('profile.userProfile',compact(['role_id','user']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDetails $userDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDetails $userDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'student_id' => 'required|numeric',
            'mobile_no' => 'required|numeric',
            'batch' => 'required|numeric',
            'hall' => 'required',
            'hall_status' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'quata' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'gurdian' => 'required',
            'local_gurdian' => 'required',
            'admitted_at' => 'required',
            'nid' => 'required|numeric',
            'about' => 'required',
        ]);

        $check = UserDetails::where('user_id',$id)->exists();
        if($check != 1){
            $userDetails = new UserDetails();
        }else{
            $userDetails = UserDetails::where('user_id',$id)->first();
        }

        if($request->file('photo')){
            $imageName = time().'.'.$request->photo->extension();
            $path = url()->to('/').'/'.'backend/global_assets/images/profile/'.$imageName;
            $request->photo->move(public_path('backend/global_assets/images/profile/'), $imageName);

            $userDetails->photo = $path;
        }
        $userDetails->user_id = $request->user_id;
        $userDetails->student_id = $request->student_id;
        $userDetails->mobile_no = $request->mobile_no;
        $userDetails->batch = $request->batch;
        $userDetails->designation = $request->designation;
        $userDetails->hall = $request->hall;
        $userDetails->hall_status = $request->hall_status;
        $userDetails->father_name = $request->father_name;
        $userDetails->mother_name = $request->mother_name;
        $userDetails->quata = $request->quata;
        $userDetails->present_address = $request->present_address;
        $userDetails->permanent_address = $request->permanent_address;
        $userDetails->religion = $request->religion;
        $userDetails->gender = $request->gender;
        $userDetails->dob = $request->dob;
        $userDetails->gurdian = $request->gurdian;
        $userDetails->local_gurdian = $request->local_gurdian;
        $userDetails->nid = $request->nid;
        $userDetails->admitted_at = $request->admitted_at;
        $userDetails->about = $request->about;
        $userDetails->save();

        return redirect()->back()->with('success','Congratulations!! Profile Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDetails $userDetails)
    {
        //
    }
}
