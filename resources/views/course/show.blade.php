@extends('layouts.app')



@section('content')


<h1>{{$course->name}}</h1>
    <h3>{{$course->period}}</h3>
{{--TODO: NOT SURE ABOUT THIS--}}
    <h3>{{ $course->teacher()[0]->name }}</h3>



    <h1>Toetsen:</h1>
    @foreach($course->tests as $test)
        {{ $test->date }} <br>
    @endforeach

<a href="/vakken/test/{{ $course->id }}" class="btn btn-primary">toets maken</a>
@endsection
