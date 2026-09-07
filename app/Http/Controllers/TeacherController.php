<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;

class TeacherController extends Controller
{

  public function index(Request $request){
      $search = trim($request->get('search'));
      $teachers = Teacher::query()
          ->with(['trainingCenter', 'area'])
          ->when($search, function ($query, $search) {
              $query->where(function ($q) use ($search) {
                  $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%")
                    ->orWhere('training_center_id', 'like', "%{$search}%")
                    ->orWhere('area_id', 'like', "%{$search}%")
                    ->orWhereHas('trainingCenter', function ($centerQuery) use ($search) {
                        $centerQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('area', function ($areaQuery) use ($search) {
                        $areaQuery->where('name', 'like', "%{$search}%");
                    });
              });
          })
          ->get();

    return view('teacher.index', compact('teachers', 'search'));
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
    //ADJUNTAR EL PDF
         $file=$request->file("urlFoto");

         $nombreArchivo = "foto_".time().".".$file->guessExtension();
         $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

         $teacher->urlFoto = $nombreArchivo;
         $teacher->save();
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