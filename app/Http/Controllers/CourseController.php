<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\TrainingCenter;

class CourseController extends Controller
{

 public function index(Request $request){
      $search = trim($request->get('search'));
      $courses = Course::query()
          ->with(['area', 'trainingCenter'])
          ->when($search, function ($query, $search) {
              $query->where(function ($q) use ($search) {
                  $q->where('id', 'like', "%{$search}%")
                    ->orWhere('course_number', 'like', "%{$search}%")
                    ->orWhere('day', 'like', "%{$search}%")
                    ->orWhere('area_id', 'like', "%{$search}%")
                    ->orWhere('training_center_id', 'like', "%{$search}%")
                    ->orWhereHas('area', function ($areaQuery) use ($search) {
                        $areaQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('trainingCenter', function ($centerQuery) use ($search) {
                        $centerQuery->where('name', 'like', "%{$search}%");
                    });
              });
          })
          ->get();

     return view('course.index', compact('courses', 'search'));
    }
   
  public function show($id){
      $course = Course::findOrFail($id);

      return view('course.show', compact('course'));
   }
  
public function create(){
    $areas = Area::all();
    $training_centers = TrainingCenter::all();

    return view('course.create',compact('areas','training_centers'));
}

public function store(Request $request){
    $course = Course::create($request->all());

    return redirect()->route('course.index')->with('success', 'Curso creado correctamente.');
}

   
 
 public function edit($id){
     $course = Course::findOrFail($id);
     $areas = Area::all();
     $training_centers = TrainingCenter::all();
     return view('course.edit', compact('course', 'areas', 'training_centers'));
 }

 public function update(Request $request, $id){
     $course = Course::findOrFail($id);
     $course->update($request->all());
     return redirect()->route('course.index')->with('success','Curso actualizado.');
 }

 public function destroy($id){
     $course = Course::findOrFail($id);
     $course->delete();
     return redirect()->route('course.index')->with('success','Curso eliminado.');
 }

   
}