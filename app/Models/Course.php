<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function trainingCenter(){
        return $this->belongsTo('App\Models\TrainingCenter');
    }

    public function teachers(){
    return $this->belongsToMany('App\Models\Teacher','course_teachers');
}

    public function apprentices(){
        return $this->hasMany('App\Models\Apprentice');
    }
}