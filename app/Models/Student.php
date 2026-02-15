<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_number', 'first_name',
        'last_name', 'email',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}

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