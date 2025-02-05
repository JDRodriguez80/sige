<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sections=Section::all();
        return view('admin.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections=Section::with('school')->get();
        $schools=School::all();
        return view('admin.section.create',compact('schools','sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
        ]);
        $section=new Section();
        $section->nombre=$request->nombre;
        $section->id_school=$request->school_id;
        $section->save();
        return redirect()->route('section.index')->with('mensaje','Seccion creada con exito')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
