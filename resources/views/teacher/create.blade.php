@extends('layouts.app')


@section('content')

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
            <label for="exampleFormControlSelect2">Geeft les in</label>
            <select multiple class="form-control" name="courses[]">
                <option value="prog">prog</option>
                <option value="datab">datab</option>
                <option>swen</option>
                <option>presam</option>
                <option>modl</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Maak docent aan</button>
    </form>

@endsection
