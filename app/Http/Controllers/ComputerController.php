<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index()
    {
        return Computer::with('apprentices')->get();
    }

    public function store(Request $request)
    {
        return Computer::create($request->all());
    }

    public function show($id)
    {
        return Computer::with('apprentices')->find($id);
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::find($id);
        $computer->update($request->all());
        return $computer;
    }

    public function destroy($id)
    {
        return Computer::destroy($id);
    }
}