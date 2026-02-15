<!DOCTYPE html>
<html>
<head><title>{{ $course->course_name }}</title></head>
<body>
  <h1>{{ $course->course_code }}: {{ $course->course_name }}</h1>
  <p>Capacity: {{ $course->capacity }}</p>

  <h2>Enrolled Students</h2>
  @forelse ($course->students as $student)
    <p>{{ $student->student_number }} — 
       {{ $student->first_name }} {{ $student->last_name }}</p>
  @empty
    <p>No students enrolled yet.</p>
  @endforelse

  <a href="{{ route('courses.index') }}">← Back</a>
</body>
</html>