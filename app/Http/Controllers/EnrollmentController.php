<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        $course  = Course::findOrFail($request->course_id);

        // Rule 1: No duplicate enrollment
        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return back()->withErrors(['error' => 'Already enrolled in this course.']);
        }

        // Rule 2: Check capacity
        if ($course->students()->count() >= $course->capacity) {
            return back()->withErrors(['error' => 'Course is already at full capacity.']);
        }

        // All good — enroll!
        $student->courses()->attach($course->id);

        return back()->with('success', 'Enrolled successfully!');
    }
}

Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');
