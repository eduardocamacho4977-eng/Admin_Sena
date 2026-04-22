<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        return Area::with('courses','teachers')->get();
    }

    public function store(Request $request)
    {
        return Area::create($request->all());
    }

    public function show($id)
    {
        return Area::with('courses','teachers')->find($id);
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->update($request->all());
        return $area;
    }

    public function destroy($id)
    {
        return Area::destroy($id);
    }
}