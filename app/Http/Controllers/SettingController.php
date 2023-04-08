<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Setting::first();
        return view("backend.settings.index", compact(['index']));
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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'app_logo_path' => 'required|max:2048',
            'app_name' => 'required',
            'app_url' => 'required',
        ]);

        $setting = Setting::find($request->id);
        $setting->app_name = $request->app_name;
        $setting->app_url = $request->app_url;
        if ($request->file('app_logo_path')) {
            $imageName = time() . '.' . $request->app_logo_path->extension();
            $request->app_logo_path->move(public_path('backend/assets/images/'), $imageName);
            $path = URL("/") . '/' . 'backend/assets/images/' . $imageName;
            return $path;
        }

        $setting->app_logo_path = $request->app_logo_path;
        $setting->update();

        return redirect()->back()->with('success', 'Settings Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
