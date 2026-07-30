<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;

class TeacherController extends Controller
{

  public function index(){
      $teachers = Teacher::all();

    return view('teacher.index', compact('teachers'));
    }
   
  public function show($id){
      $teacher = Teacher::findOrFail($id);

      return view('teacher.show', compact('teacher'));
   }

public function create(){
    $areas = Area::all();

    $training_centers = TrainingCenter::all();

    return view('teacher.create',compact('areas', 'training_centers'));
}

public function store(Request $request){
    $teacher = Teacher::create($request->all());

    return redirect()->route('teacher.index')->with('success', 'Profesor creado correctamente.');
}

 public function edit($id){
      $teacher = Teacher::findOrFail($id);
      $areas = Area::all();
      $training_centers = TrainingCenter::all();
      return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
  }
  

 public function update(Request $request, $id){
   $teacher = Teacher::findOrFail($id);
   $teacher->update($request->all());
   return redirect()->route('teacher.index')->with('success','Profesor actualizado.');
 }

 public function destroy($id){
   $teacher = Teacher::findOrFail($id);
   $teacher->delete();
   return redirect()->route('teacher.index')->with('success','Profesor eliminado.');
 }

  
}