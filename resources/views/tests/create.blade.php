@extends('layouts.app')

@section('content')

<h1>Toets aanmaken voor {{ $course->name }}</h1>

<form action="/vakken/test/{{$course->id}}" method="post">
    @csrf
    <div class="form-group">
        <label for="date">Datum</label>
        <input type="date" id="date" name="date" required>
    </div>

    <div class="form-group">
        <label for="assesment">assesment</label>
        <input type="checkbox" name="assesment">
    </div>

    <button type="submit" class="btn btn-primary">Maak test aan</button>
</form>

@endsection
