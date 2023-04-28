<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::join('universities', 'universities.id', '=', 'schools.university_id')->get();
        return view("backend.school.schools", compact(['schools']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $university = University::where('is_active', 1)->get();
        return view('backend.school.create', compact(['university']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required',
            'university_id' => 'required',
            'is_active' => 'required',
        ]);

        $school = new School();
        $school->school_name = $request->school_name;
        $school->university_id = $request->university_id;
        $school->is_active = $request->is_active;
        $school->save();

        return redirect()->back()->with('success', 'Congratulations!! School Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $school = School::join('universities', 'universities.id', '=', 'schools.university_id')->first();
        return view('backend.school.edit', compact(['school']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'school_name' => 'required',
            'university_id' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $school = School::find($id);
        $school->school_name = $request->school_name;
        $school->university_id = $request->university_id;
        $school->is_active = $request->is_active;
        $school->update();

        return redirect()->back()->with('success', 'Congratulations!! School Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
