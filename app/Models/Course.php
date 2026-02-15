<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_code', 'course_name', 'capacity',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
}

class CourseController extends Controller
{
    // Show list of all courses
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Show one course + its enrolled students
    public function show(Course $course)
    {
        $students = $course->students();
        return view('courses.show', compact('course', 'students'));
    }
}