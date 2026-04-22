<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('area','trainingCenter','teachers','apprentices')->get();
    }

    public function store(Request $request)
    {
        return Course::create($request->all());
    }

    public function show($id)
    {
        return Course::with('area','trainingCenter','teachers','apprentices')->find($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->update($request->all());
        return $course;
    }

    public function destroy($id)
    {
        return Course::destroy($id);
    }
}