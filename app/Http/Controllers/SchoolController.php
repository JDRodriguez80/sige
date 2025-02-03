<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('admin.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'logo' => 'required',
        ]);

        $school = new School();
        $school->nombre=$request->nombre;
        $school->direccion=$request->direccion;
        $school->telefono=$request->telefono;
        $school->email=$request->email;
        $school->logo=$request->file('logo')->store('logos','public');
        $school->save();
        return redirect('/admin/school')->with('mensaje', 'el estudiante fue agregado')->with('icono', 'success');
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
        $school=School::find($id);

        return view('admin.school.edit', compact('school'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'logo' => 'required',
        ]);

        $school =School::find($id);
        $school->nombre=$request->nombre;
        $school->direccion=$request->direccion;
        $school->telefono=$request->telefono;
        $school->email=$request->email;
        unlink(public_path('storage/'.$school->logo));
        $school->logo=$request->file('logo')->store('logos','public');
        $school->save();
        return redirect()->route('school.index')->with('mensaje', 'La escuela fue actualizada')->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $school = School::find($id);
        unlink(public_path('storage/'.$school->logo));
        School::destroy($id);
        return redirect()->route('school.index')->with('mensaje', 'La escuela fue eliminada')->with('icono', 'warning');
    }
}
