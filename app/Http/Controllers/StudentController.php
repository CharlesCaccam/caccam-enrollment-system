<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function show(Student $student)
    {
        $courses = $student->courses;
        return view('students.show', compact('student', 'courses'));
    }
}