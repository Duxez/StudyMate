@extends('layouts.app')



@section('content')


<h1>{{$course->name}}</h1>
    <h3>{{$course->period}}</h3>
{{--TODO: NOT SURE ABOUT THIS--}}
    <h3>{{ $course->teacher()[0]->name }}</h3>
@endsection