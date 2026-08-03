<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{

   public function index(Request $request){
      $search = trim($request->get('search'));
      $training_centers = TrainingCenter::query()
          ->when($search, function ($query, $search) {
              $query->where(function ($q) use ($search) {
                  $q->where('id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
              });
          })
          ->get();

     return view('training_center.index', compact('training_centers', 'search'));
    }
   
   public function show($id){
      $training_center = TrainingCenter::findOrFail($id);

      return view('training_center.show', compact('training_center'));
   }


  public function create(){

    return view('training_center.create');
}

   public function store(Request $request){

    $training_center = TrainingCenter::create($request->all());

    return redirect()->route('training_center.index')->with('success', 'Centro de formación creado correctamente.');
}

   public function edit($id){
   $training_center = TrainingCenter::findOrFail($id);
   return view('training_center.edit', compact('training_center'));
}

   public function update(Request $request, $id){
   $training_center = TrainingCenter::findOrFail($id);
   $training_center->update($request->all());
   return redirect()->route('training_center.index')->with('success','Centro actualizado.');
}

   public function destroy($id){
   $training_center = TrainingCenter::findOrFail($id);
   $training_center->delete();
   return redirect()->route('training_center.index')->with('success','Centro eliminado.');
}


  
}