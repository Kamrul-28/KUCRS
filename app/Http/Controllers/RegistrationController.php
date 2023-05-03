<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Discipline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registration = Registration::where('student_id',Auth::user()->id)->get();
        return view('backend.registration.registrations',compact(['registration']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $request = [];
        $discipline = Discipline::where('is_active',1)->get();
        return view('backend.registration.create',compact(['discipline','request']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_type' => 'required',
            'discipline_id' => 'required',
            'term' => 'required',
            'year' => 'required',
            'enrollment_session' => 'required',
        ]);

        if(Registration::where('student_id',Auth::user()->id)
        ->where('enrollment_session',$request->enrollment_session)
        ->where('enrollment_year',$request->year)
        ->where('enrollment_term',$request->term)->exists()){

            return redirect()->back()->with('fail','Opps!! Registration Already Exists');

        }else{
            $registration = new Registration();
            $registration->registration_type = $request->registration_type;
            $registration->student_id = Auth::user()->id;
            $registration->discipline_id = $request->discipline_id;
            $registration->enrollment_year = $request->year;
            $registration->enrollment_term = $request->term;
            $registration->enrollment_session = $request->enrollment_session;
            $registration->save();
        }


        return redirect()->route('registration.registrations',compact(['request','registration']))->with('success','New Registration Created Successfully. Please Add Course and Complete Registration');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
