@extends('layouts.app')


@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoonnummer</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $teacher)
            <tr>
                <th scope="row"><a href="/docenten/{{$teacher->id}}">-</a></th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->phone}}</td>
                <td><a href="/docenten/{{$teacher->id}}/edit">Bewerk</a></td>
                <td>
{{--                    TODO: FIX THIS WITH RESOURCE CONTROLLER--}}

                    <a href="/docenten/{{$teacher->id}}" onclick="event.preventDefault(); document.getElementById('delete{{$teacher->id}}').submit()">X</a>
                    <form action="/docenten/{{$teacher->id}}" method="post" id="delete{{$teacher->id}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/docenten/create" class="btn btn-primary btn-lg active">Docent aanmaken</a>

@endsection
