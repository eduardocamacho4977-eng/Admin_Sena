<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{

public function index(Request $request){
      $search = trim($request->get('search'));
      $apprentices = Apprentice::query()
          ->with(['course', 'computer'])
          ->when($search, function ($query, $search) {
              $query->where(function ($q) use ($search) {
                  $q->where('id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('cell_number', 'like', "%{$search}%")
                    ->orWhere('course_id', 'like', "%{$search}%")
                    ->orWhere('computer_id', 'like', "%{$search}%")
                    ->orWhereHas('course', function ($courseQuery) use ($search) {
                        $courseQuery->where('course_number', 'like', "%{$search}%");
                    })
                    ->orWhereHas('computer', function ($computerQuery) use ($search) {
                        $computerQuery->where('number', 'like', "%{$search}%")
                            ->orWhere('brand', 'like', "%{$search}%");
                    });
              });
          })
          ->get();

     return view('apprentice.index', compact('apprentices', 'search'));

    }
   
  public function show($id){
      $apprentice = Apprentice::findOrFail($id);

      return view('apprentice.show', compact('apprentice'));
   }
  
public function create(){
    $courses = Course::all();

    $computers = Computer::all();

    return view('apprentice.create',compact('courses', 'computers' ));
}

public function store(Request $request){
    $apprentice = Apprentice::create($request->all());
    //ADJUNTAR EL PDF
         $file=$request->file("urlFoto");

         $nombreArchivo = "foto_".time().".".$file->guessExtension();
         $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

         $apprentice->urlFoto = $nombreArchivo;
         $apprentice->save();

    return redirect()->route('apprentice.index')->with('success', 'Aprendiz creado correctamente.');
}

 public function edit($id){
        $apprentice = Apprentice::findOrFail($id);
        $courses = Course::all();
        $computers = Computer::all();
        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

 public function update(Request $request, $id){
     $apprentice = Apprentice::findOrFail($id);
     $apprentice->update($request->all());
     return redirect()->route('apprentice.index')->with('success','Aprendiz actualizado.');
 }

 public function destroy($id){
     $apprentice = Apprentice::findOrFail($id);
     $apprentice->delete();
     return redirect()->route('apprentice.index')->with('success','Aprendiz eliminado.');
 }


}