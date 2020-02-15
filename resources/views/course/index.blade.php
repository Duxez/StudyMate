@extends('layouts.app')



@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">periode</th>
            <th scope="col">coördinator</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row"><a href="">-</a></th>
                <td>{{$course->name}}</td>
                <td>{{$course->period}}</td>
                <td>{{$course->teacher_name}}</td>
                <td><a href="">Bewerk</a></td>
                <td>
{{--                    <a href="/docenten/{{$teacher->id}}" onclick="event.preventDefault(); document.getElementById('delete{{$teacher->id}}').submit()">X</a>--}}
{{--                    <form action="/docenten/{{$teacher->id}}" method="post" id="delete{{$teacher->id}}">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                    </form>--}}
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/vakken/create" class="btn btn-primary btn-lg active">Vak aanmaken</a>

@endsection
