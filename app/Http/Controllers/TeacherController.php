<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::with('area','trainingCenter','courses')->get();
    }

    public function store(Request $request)
    {
        return Teacher::create($request->all());
    }

    public function show($id)
    {
       return TrainingCenter::with('courses','teachers')->get();
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->update($request->all());
        return $teacher;
    }

    public function destroy($id)
    {
        return Teacher::destroy($id);
    }
}