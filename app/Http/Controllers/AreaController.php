<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index(Request $request){
      $search = trim($request->get('search'));
      $areas = Area::query()
          ->when($search, function ($query, $search) {
              $query->where('name', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
          })
          ->get();

     return view('area.index', compact('areas', 'search'));
    }
   
   public function show($id){
      $area = Area::findOrFail($id);

      return view('area.show', compact('area'));
   }
   
   public function create(){

    return view('area.create');
}

  public function store(Request $request){
    $area = Area::create($request->all());
        //ADJUNTAR EL PDF
         $file=$request->file("urlFoto");

         $nombreArchivo = "foto_".time().".".$file->guessExtension();
         $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

         $area->urlFoto = $nombreArchivo;
         $area->save();
  

    return redirect()->route('area.index')->with('success', 'Área creada correctamente.');
}

  public function edit($id){
    $area = Area::findOrFail($id);
    return view('area.edit', compact('area'));
  }

  public function update(Request $request, $id){
    $area = Area::findOrFail($id);
    $area->update($request->all());
    return redirect()->route('area.index')->with('success', 'Área actualizada.');
  }

  public function destroy($id){
    $area = Area::findOrFail($id);
    $area->delete();
    return redirect()->route('area.index')->with('success', 'Área eliminada.');
  }

   
}