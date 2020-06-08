@extends('layouts.app')



@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Periode</th>
            <th scope="col">Studiepunten (ECTS)</th>
            <th scope="col">Coördinator</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row"><a href="/vakken/{{$course->id}}">-</a></th>
                <td>{{$course->name}}</td>
                <td>{{$course->period}}</td>
                <td>{{$course->ECTS}}</td>
                <td>{{$course->teacher_name}}</td>
                <td><a href="/vakken/{{$course->id}}/edit">Bewerk</a></td>
                <td>
                    <a href="/vakken/{{$course->id}}" onclick="event.preventDefault(); document.getElementById('delete{{$course->id}}').submit()">X</a>
                    <form action="/vakken/{{$course->id}}" method="post" id="delete{{$course->id}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/vakken/create" class="btn btn-primary btn-lg active">Vak aanmaken</a>

@endsection
