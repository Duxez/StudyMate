@extends('layouts.app')



@section('content')


<h1>{{$course->name}}</h1>
    <h3>{{$course->period}}</h3>
{{--TODO: NOT SURE ABOUT THIS--}}
    <h3>{{ $course->teacher()[0]->name }}</h3>



    <h1>Toetsen:</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Datum</th>
        <th scope="col">Assesment</th>
        <th scope="col">Uploaden</th>
    </tr>
    </thead>
    <tbody>

    @foreach($course->tests as $test)
        {{ $test }}
        <tr>
            <th scope="row">1</th>
            <td>{{$test->date}}</td>
            <td>@if($test->assesment) Ja @else Nee @endif</td>
            <td>
            @if($test->assesment)
                    <form action="/upload/assesment/{{$course->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$test->id}}">
                        <input type="file" name="bestand">
                        <button type="submit">submit</button>
                    </form>
            @endif
            </td>
        </tr>

    @endforeach

    </tbody>
</table>


<a href="/vakken/test/{{ $course->id }}" class="btn btn-primary">toets maken</a>
@endsection
