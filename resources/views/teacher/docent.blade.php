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
                <th scope="row"><a href="">-</a></th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->phone}}</td>
                <td><a href="">Bewerk</a></td>
                <td><a href="">X</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/docent/create" class="btn btn-primary btn-lg active">Docent aanmaken</a>

@endsection
