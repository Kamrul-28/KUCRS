<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Discipline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::join('disciplines', 'disciplines.id', '=', 'courses.discipline_id')
            ->select('courses.*', 'disciplines.discipline_name')
            ->get();
        $users = User::all();
        return view("backend.course.courses", compact(['courses', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role_id', 3)->get();
        $discipline = Discipline::where('is_active', 1)->get();
        return view('backend.course.create', compact(['discipline', 'teachers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_title' => 'required',
            'discipline_id' => 'required',
            'course_code' => 'required',
            'course_credit' => 'required',
            'term' => 'required',
            'year' => 'required',
            'description' => 'required',
            'is_active' => 'required',
        ]);

        $course = new Course();
        $course->course_title = $request->course_title;
        $course->discipline_id = $request->discipline_id;
        $course->course_code = $request->course_code;
        if ($request->description) {
            $course->description = $request->description;
        }
        $course->year = $request->year;
        $course->term = $request->term;
        $course->course_credit = $request->course_credit;
        if ($request->sec_a_syllabus) {
            $course->sec_a_syllabus = $request->sec_a_syllabus;
        }
        if ($request->sec_b_syllabus) {
            $course->sec_b_syllabus = $request->sec_b_syllabus;
        }
        if ($request->teacher_id) {
            $teachers = implode(',', $request->teacher_id);
            $course->teacher_id = $teachers;
        }
        $course->is_active = $request->is_active;
        $course->save();

        return redirect()->back()->with('success', 'Congratulations!! Course Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $teachers = User::where('role_id', 3)->get();
        $discipline = Discipline::where('is_active', 1)->get();
        $course = Course::find($id);
        return view('backend.course.edit', compact(['course', 'discipline', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_title' => 'required',
            'discipline_id' => 'required',
            'course_code' => 'required',
            'course_credit' => 'required',
            'term' => 'required',
            'year' => 'required',
            'description' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $course = Course::find($id);
        $course->course_title = $request->course_title;
        $course->discipline_id = $request->discipline_id;
        $course->course_code = $request->course_code;
        if ($request->description) {
            $course->description = $request->description;
        }
        $course->year = $request->year;
        $course->term = $request->term;
        $course->course_credit = $request->course_credit;
        if ($request->sec_a_syllabus) {
            $course->sec_a_syllabus = $request->sec_a_syllabus;
        }
        if ($request->sec_b_syllabus) {
            $course->sec_b_syllabus = $request->sec_b_syllabus;
        }
        if ($request->teacher_id) {
            $teachers = implode(',', $request->teacher_id);
            $course->teacher_id = $teachers;
        }
        $course->is_active = $request->is_active;
        $course->update();

        return redirect()->back()->with('success', 'Congratulations!! Course Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function offered()
    {
        return view('backend.course.offered');
    }
}
