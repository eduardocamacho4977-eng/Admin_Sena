<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{

public function index(){
      $apprentices = Apprentice::all();

     return view('apprentice.index', compact('apprentices'));

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