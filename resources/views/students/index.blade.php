<!DOCTYPE html>
<html>
<head><title>All Students</title></head>
<body>
  <h1>Students</h1>
  @foreach ($students as $student)
    <p>
      <a href="{{ route('students.show', $student) }}">
        {{ $student->first_name }} {{ $student->last_name }}
      </a>
    </p>
  @endforeach
</body>
</html>