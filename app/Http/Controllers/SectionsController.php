<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Sections::all();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Sections::where('name', $request->name)->first();
        if($section){
            Alert::error('Section already exists', 'Error');
            return redirect()->back();
        }
        Sections::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
        ]);
        Alert::success('Section created successfully', 'Success');
        return redirect( route('Sections.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sections $sections)
    {
        //dd($request->all());
        $section = Sections::where('id', $request->id)->first();
        $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
        ]);
        Alert::success('Section updated successfully', 'Success');
        return redirect( route('Sections.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $section = Sections::where('id', $request->id)->first();
        $section->delete();
        Alert::success('Section deleted successfully', 'Success');
        return redirect( route('Sections.index') );
    }
}
