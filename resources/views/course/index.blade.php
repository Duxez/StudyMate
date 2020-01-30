<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>courses</title>
</head>
<body>
<ul>
    @foreach($courses as $course)
        <a href="/course/{{ $course->id }} "><li>{{ $course->id }}  {{ $course->created_at }}</li></a>


{{--        DELETE--}}
        <form action="/course/ {{ $course->id }} " method="post">
            @csrf
            @method("DELETE")

            <button type="submit">X</button>
        </form>


    @endforeach
</ul>

</body>
</html>
