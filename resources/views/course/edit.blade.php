@extends('layouts.app')



@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach

    @endif

    <h1>Vak Bewerken</h1>

    <form action="/vakken/{{$course->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Vak naam</label>
            <input type="text" class="form-control" placeholder="Vak naam" name="name" value="{{$course->name}}" required>
        </div>
        <div class="form-group">
            <label>Periode</label>
            <input type="number" max="12" class="form-control" placeholder="periode (blok)" name="period" value="{{$course->period}}" required>
        </div>

        <div class="form-group">
            <label>Aantal ECTS</label>
            <input type="number" max="12" class="form-control" placeholder="Studiepunten (ECTS)" name="ECTS" value="{{$course->ECTS}}" required>
        </div>

        <div class="form-group">
            <label>Vak Coördinator</label>
            <select class="form-control" name="teacher" required>
                @foreach($teachers as $teacher)
                    @if($course->coordinator == $teacher->id)
                        <option value="{{$teacher->id}}" selected>{{ $teacher->name }}</option>
                    @else
                        <option value="{{$teacher->id}}">{{ $teacher->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Bewerk docent gegevens</button>
    </form>



@endsection
