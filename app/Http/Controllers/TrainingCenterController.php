<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
    public function index()
    {
      return TrainingCenter::with('courses','teachers')->get();
    }

    public function store(Request $request)
    {
        return TrainingCenter::create($request->all());
    }

    public function show($id)
    {
        return TrainingCenter::with('courses','teachers')->find($id);
    }

    public function update(Request $request, $id)
    {
        $trainingCenter = TrainingCenter::find($id);
        $trainingCenter->update($request->all());
        return $trainingCenter;
    }

    public function destroy($id)
    {
        return TrainingCenter::destroy($id);
    }
}