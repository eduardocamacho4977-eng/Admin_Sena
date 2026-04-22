<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;

class ApprenticeController extends Controller
{
    // Consulta con relaciones
    public function index()
    {
        return Apprentice::with('course','computer')->get();
    }

    public function store(Request $request)
    {
        return Apprentice::create($request->all());
    }

    public function show($id)
    {
        return Apprentice::with('course','computer')->find($id);
    }

    public function update(Request $request, $id)
    {
        $apprentice = Apprentice::find($id);
        $apprentice->update($request->all());
        return $apprentice;
    }

    public function destroy($id)
    {
        return Apprentice::destroy($id);
    }
}