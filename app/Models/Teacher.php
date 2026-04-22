<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function trainingCenter(){
        return $this->belongsTo('App\Models\TrainingCenter');
    }

    public function courses(){
    return $this->belongsToMany('App\Models\Course','course_teachers');

    }
}