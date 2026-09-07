<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index(Request $request){
    $search = trim($request->get('search'));
    $computers = Computer::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('number', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");
            });
        })
        ->get();

     return view('computer.index',compact('computers', 'search'));
    }
   
   public function show($id){
      $computer = Computer::findOrFail($id);

      return view('computer.show', compact('computer'));
   }

   public function create(){ 

    return view('computer.create');
}

    public function store(Request $request){ 
     $computer = Computer::create($request->all());
     //ADJUNTAR EL PDF
         $file=$request->file("urlFoto");

         $nombreArchivo = "foto_".time().".".$file->guessExtension();
         $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

         $computer->urlFoto = $nombreArchivo;
         $computer->save();

     return redirect()->route('computer.index')->with('success', 'Computadora creada correctamente.');
}

    public function edit($id){
     $computer = Computer::findOrFail($id);
     return view('computer.edit', compact('computer'));
}

    public function update(Request $request, $id){
     $computer = Computer::findOrFail($id);
     $computer->update($request->all());
     return redirect()->route('computer.index')->with('success','Computadora actualizada.');
}

    public function destroy($id){
     $computer = Computer::findOrFail($id);
     $computer->delete();
     return redirect()->route('computer.index')->with('success','Computadora eliminada.');
}


}