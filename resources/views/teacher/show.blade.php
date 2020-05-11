@extends('layouts.app')


@section('content')

    <h1>Docent</h1>

    <h2>{{ $data[0]->name }}</h2>
    <h2>{{ $data[0]->email }}</h2>
    <h2>{{ $data[0]->phone }}</h2>
    <h2>@if($data[0]->teaches) Ja @else Nee @endif</h2>
    @foreach($data[0]->courses as $course)
        <h2>{{ $course->name }}</h2>
    @endforeach


    <a href="/docenten/{{$data[0]->id}}/edit" class="btn btn-primary btn-lg">Bewerken</a>

@endsection
