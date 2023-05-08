<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Discipline;
use App\Models\Course;
use App\Models\RegisteredCourse;
use App\Models\Fee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id <= 3){
            $registration = Registration::all();
        }else{
            $registration = Registration::where('student_id',Auth::user()->id)->get();
        }

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
    public function complete($id)
    {
        $registration_id = Crypt::decrypt($id);
        $registration = Registration::join('disciplines','disciplines.id','=','registrations.discipline_id')
        ->where('registrations.id',$registration_id)
        ->select('registrations.*','disciplines.discipline_name')
        ->first();

        $courses = Course::where('term',$registration->enrollment_term)->where('year',$registration->enrollment_year)->get();
        $registered_courses =  RegisteredCourse::join('courses','courses.id','=','registered_courses.course_id')
        ->where('registered_courses.registration_id',$registration_id)
        ->select('registered_courses.*','courses.*')
        ->get();

        return view('backend.registration.complete',compact(['registration','courses','registered_courses']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addRegisteredCourse(Request $request,$id)
    {
        $registration_id = Crypt::decrypt($id);
        $request->validate([
            'registered_course' => 'required',
        ]);

        $rcourseCheck =  RegisteredCourse::where('registration_id',$registration_id)->where('course_id',$request->registered_course)->exists();
        if($rcourseCheck){
            return redirect()->back()->with('fail',"Course Already In The Registered List");
        }
        $course_registration = new RegisteredCourse();
        $course_registration->registration_id = $registration_id;
        $course_registration->course_id = $request->registered_course;
        $course_registration->save();

        return redirect()->back()->with('success',"Course Added Successfully!!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function completeRegistration($id)
    {
        $registration_id = Crypt::decrypt($id);

        $registration_new = Registration::join('disciplines','disciplines.id','=','registrations.discipline_id')
        ->where('registrations.id',$registration_id)
        ->select('registrations.*','disciplines.discipline_name')
        ->first();
        $total_credit = 0;
        $courses = Course::where('term',$registration_new->enrollment_term)->where('year',$registration_new->enrollment_year)->get();
        foreach($courses as $course){
            $total_credit += $course->course_credit;
        }

        $registration_complete = Registration::where('registrations.id',$registration_id)->first();
        $registration_complete->is_completed += 1;
        $registration_complete->enrolled_credit = $total_credit;
        $registration_complete->save();

        return redirect()->route('registration.registrations');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function pay($id)
    {
        $registration_id = Crypt::decrypt($id);
        $registration = Registration::join('disciplines','disciplines.id','=','registrations.discipline_id')
        ->where('registrations.id',$registration_id)
        ->select('registrations.*','disciplines.discipline_name')
        ->first();
        $total_credit = 0;
        $courses = Course::where('term',$registration->enrollment_term)->where('year',$registration->enrollment_year)->get();
        foreach($courses as $course){
            $total_credit += $course->course_credit;
        }

        $fees = Fee::sum('amount');
        $all_fees = Fee::where('fee_name','!=','Credit Fee')->where('fee_name','!=','Exam Fee')->get();
        $fees_without_credit_exam = $fees-60-24;
        $credit_fee = $total_credit*60;
        $exam_fee = $total_credit*24;
        $total_fee = $fees_without_credit_exam + $credit_fee + $exam_fee;

        return view('backend.registration.pay',compact(['all_fees','registration_id','total_credit','total_fee','credit_fee','exam_fee']));
    }

    public function completeRegistrationPayment($id){
        $registration_id = Crypt::decrypt($id);

        $registration_complete = Registration::where('registrations.id',$registration_id)->first();
        $registration_complete->is_completed += 1;
        $registration_complete->save();

        return redirect()->route('registration.registrations');
    }
}
