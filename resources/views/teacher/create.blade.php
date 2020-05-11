@extends('layouts.app')


@section('content')

    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @enderror

        <h1>Docent aanmaken</h1>

        <form action="/docenten" method="post">
            @csrf
            <div class="form-group">
                <label>Docent naam</label>
                <input type="text" class="form-control" placeholder="Naam" name="name" required>
            </div>
            <div class="form-group">
                <label>Docent E-mail</label>
                <input type="email" class="form-control" placeholder="E-mail" name="email" required>
            </div>

            <div class="form-group">
                <label>Docent Telefoonnummer</label>
                <input type="number" class="form-control" placeholder="Telefoonnummer" name="number" required>
            </div>

            <div class="form-group">
                <label>Krijg les van deze docent?</label>
                <input type="checkbox" class="form-control" name="teaches">
            </div>
            <div class="form-group">
                <label>Geeft les in</label>
                <select multiple class="form-control" name="courses[]">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Maak docent aan</button>
        </form>

@endsection
