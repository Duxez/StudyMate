@extends('layouts.app')



@section('content')


    <h1>Vak aanmaken</h1>

    <form action="/vakken" method="post">
        @csrf
        <div class="form-group">
            <label>Vak naam</label>
            <input type="text" class="form-control" placeholder="Vak naam" name="name" required>
        </div>
        <div class="form-group">
            <label>Periode</label>
            <input type="number" max="12" class="form-control" placeholder="periode (blok)" name="period" required>
        </div>

        <div class="form-group">
            <label>Vak Coördinator</label>
            <select class="form-control" name="teacher" required>
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Maak docent aan</button>
    </form>


@endsection
