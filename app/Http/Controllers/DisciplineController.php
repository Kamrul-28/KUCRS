<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = Discipline::join('schools', 'schools.id', '=', 'disciplines.school_id')->get();
        return view("backend.discipline.disciplines", compact(['disciplines']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::where('is_active', 1)->get();
        return view('backend.discipline.create', compact(['schools']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'discipline_name' => 'required',
            'school_id' => 'required',
            'is_active' => 'required',
        ]);

        $discipline = new discipline();
        $discipline->discipline_name = $request->discipline_name;
        $discipline->school_id = $request->school_id;
        $discipline->is_active = $request->is_active;
        $discipline->save();

        return redirect()->back()->with('success', 'Congratulations!! Discipline Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $discipline = Discipline::join('schools', 'schools.id', '=', 'disciplines.university_id')->first();
        return view('backend.discipline.edit', compact(['discipline']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'discipline_name' => 'required',
            'school_id' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $discipline = Discipline::find($id);
        $discipline->discipline_name = $request->discipline_name;
        $discipline->school_id = $request->school_id;
        $discipline->is_active = $request->is_active;
        $discipline->update();

        return redirect()->back()->with('success', 'Congratulations!! Discipline Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(discipline $discipline)
    {
        //
    }
}
