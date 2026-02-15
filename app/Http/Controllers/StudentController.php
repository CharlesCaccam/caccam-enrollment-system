<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Show list of all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show one student's profile + their courses
    public function show(Student $student)
    {
        $courses = $student->courses();
        return view('students.show', compact('student', 'courses'));
    }
}
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');