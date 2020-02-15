@extends('layouts.app')


@section('content')


    <h1>Docent aanpassen</h1>

    <form action="/docenten/{{ $teacher->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Docent naam</label>
            <input type="text" class="form-control" placeholder="Naam" name="name" value="{{ $teacher->name }}" required>
        </div>

        <div class="form-group">
            <label>Docent E-mail</label>
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ $teacher->email }}" required>
        </div>

        <div class="form-group">
            <label>Docent Telefoonnummer</label>
            <input type="text" class="form-control" placeholder="Telefoonnummer" name="phone" value="{{ $teacher->phone }} "required>
        </div>

        <button type="submit" class="btn btn-primary">Bewerken</button>

    </form>


@endsection
