<!DOCTYPE html>
<html>
<head><title>All Courses</title></head>
<body>
    <h1>Courses</h1>
    @foreach ($courses as $course)
        <p>
            <a href="{{ route('courses.show', $course) }}">
                {{ $course->course_code }}: {{ $course->course_name }}
            </a>
            (Capacity: {{ $course->capacity }})
        </p>
    @endforeach
</body>
</html>