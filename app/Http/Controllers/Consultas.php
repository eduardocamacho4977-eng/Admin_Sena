<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class Consultas extends Controller
{
    //
    public function consultas (){
        $area=Course::find(2);
       return $area;
    
    }
}
