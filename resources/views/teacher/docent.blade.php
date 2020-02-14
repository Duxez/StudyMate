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
                    <a class="nav-link" href="/docenten/{{ $teacher->id }}" onclick="event.preventDefault(); document.getElementById('delete').submit();">X</a>
                    <form id="delete" action="/docenten/{{ $teacher->id }}" style="display: none;">
                        @method('delete')
                    </form>
                </td>




            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/docent/create" class="btn btn-primary btn-lg active">Docent aanmaken</a>

@endsection
