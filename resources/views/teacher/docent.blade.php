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

                </td>

                <form id="delete" action="{{ url('docenten', $teacher->id) }}" style="display: none;">
                    @csrf
                    @method("delete")
                    <button type="submit">Delete</button>
                </form>


            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/docent/create" class="btn btn-primary btn-lg active">Docent aanmaken</a>

@endsection
