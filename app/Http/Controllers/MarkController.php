<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Mark;
use App\Models\RegisteredCourse;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = [];
        $discipline = Discipline::all();
        return view('backend.mark.marks', compact(['request', 'discipline']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'registration_type' => 'required',
            'discipline_id' => 'required',
            'term' => 'required',
            'year' => 'required',
            'enrollment_session' => 'required',
        ]);

        $registration = Registration::join('users', 'users.id', '=', 'registrations.student_id')
            ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('registrations.registration_type', $request->registration_type)
            ->where('registrations.discipline_id', $request->discipline_id)
            ->where('registrations.enrollment_term', $request->term)
            ->where('registrations.enrollment_year', $request->year)
            ->where('registrations.enrollment_session', $request->enrollment_session)
            ->where('registrations.is_completed', 6)
            ->select('registrations.*', 'registrations.id as reg_id', 'users.*', 'user_details.*')
            ->get();


        return view('backend.mark.create', compact(['registration']));
    }

    public function generate($id)
    {
        $id = Crypt::decrypt($id);

        $registered_courses = RegisteredCourse::join('courses', 'courses.id', '=', 'registered_courses.course_id')
            ->join('registrations', 'registrations.id', '=', 'registered_courses.registration_id')
            ->join('users', 'users.id', '=', 'registrations.student_id')
            ->join('user_details', 'user_details.user_id', '=', 'registrations.student_id')
            ->where('registered_courses.registration_id', $id)
            ->select('courses.*', 'courses.id as cid', 'registrations.*', 'users.*')->get();

        $user = RegisteredCourse::join('courses', 'courses.id', '=', 'registered_courses.course_id')
            ->join('registrations', 'registrations.id', '=', 'registered_courses.registration_id')
            ->join('users', 'users.id', '=', 'registrations.student_id')
            ->join('user_details', 'user_details.user_id', '=', 'registrations.student_id')
            ->where('registered_courses.registration_id', $id)
            ->select('courses.*', 'users.name', 'user_details.student_id')->first();

        return view('backend.mark.generate', compact(['registered_courses', 'user']));
    }

    public function store(Request $request)
    {
        $marks = new Mark();
        return $request;
    }

    public function edit(Mark $mark)
    {
        //
    }

    public function update(Request $request, Mark $mark)
    {
        //
    }

    public function destroy(Mark $mark)
    {
        //
    }
}
