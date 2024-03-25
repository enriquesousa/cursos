<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    // InstructorDashboard
    public function InstructorDashboard(){
       return view('instructor.instructor_dashboard');
    }

    
}
