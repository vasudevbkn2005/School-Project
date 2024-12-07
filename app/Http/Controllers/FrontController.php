<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function teacherdesign() {
        $teacher = Teacher::all();
        return view('teacherdesign',compact('teacher'));
    }
    public function show($id)
    {
        $teacher = Teacher::with('subject')->findOrFail($id);
        return view('teacherdetail', compact('teacher'));
    }

    public function studentdesign()
    {
        $student = Student::all();
        return view('studentdesign', compact('student'));
    }
}
