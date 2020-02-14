@extends('layouts.app')


@section('content')

    <h1>Docent</h1>

    <h2>{{ $data[0]->name }}</h2>
    <h2>{{ $data[0]->email }}</h2>
    <h2>{{ $data[0]->phone }}</h2>

@endsection
