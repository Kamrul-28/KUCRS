<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $university = University::all();
        return view("backend.university.universitys", compact(['university']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.university.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'university_name' => 'required',
            'is_active' => 'required',
        ]);

        $university = new University();
        $university->university_name = $request->university_name;
        $university->is_active = $request->is_active;
        $university->save();

        return redirect()->back()->with('success', 'Congratulations!! University Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $university = University::find($id);
        return view('backend.university.edit', compact(['university']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'university_name' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $university = University::find($id);
        $university->university_name = $request->university_name;
        $university->is_active = $request->is_active;
        $university->update();

        return redirect()->back()->with('success', 'Congratulations!! University Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        //
    }
}
