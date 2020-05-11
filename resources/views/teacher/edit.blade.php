@extends('layouts.app')


@section('content')


    <h1>Docent aanpassen</h1>

    <form action="/docenten/{{ $teacher->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Docent naam</label>
            <input type="text" class="form-control" placeholder="Naam" name="name" value="{{ $teacher->name }}"
                   required>
        </div>

        <div class="form-group">
            <label>Docent E-mail</label>
            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ $teacher->email }}"
                   required>
        </div>

        <div class="form-group">
            <label>Docent Telefoonnummer</label>
            <input type="text" class="form-control" placeholder="Telefoonnummer" name="phone"
                   value="{{ $teacher->phone }} " required>
        </div>

        <div class="form-group">
            <label>Krijg les van deze docent?</label>
            <input type="checkbox" class="form-control" name="teaches" @if($teacher->teaches) checked @endif>
        </div>

        <div class="form-group">
            <label>Geeft les in</label>
            <select multiple class="form-control" name="courses[]">
                @foreach($courses as $course)
                    @if($teacher->courses()->where('id', $course->id)->exists())
                        <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                    @else
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Bewerken</button>

    </form>


@endsection
