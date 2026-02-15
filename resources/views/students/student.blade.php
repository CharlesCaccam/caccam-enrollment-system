<!DOCTYPE html>
<html>
<head><title>{{ $student->first_name }}</title></head>
<body>
  <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>
  <p>Student No: {{ $student->student_number }}</p>
  <p>Email: {{ $student->email }}</p>

  <h2>Enrolled Courses</h2>
  @forelse ($student->courses as $course)
    <p>{{ $course->course_code }} — {{ $course->course_name }}</p>
  @empty
    <p>Not enrolled in any courses.</p>
  @endforelse

  <a href="{{ route('students.index') }}">← Back</a>
</body>
</html>