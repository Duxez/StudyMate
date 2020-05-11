@extends('layouts.app')



@section('content')


    <h1>{{$course->name}}</h1>
    <h3>{{$course->period}}</h3>
    {{--TODO: NOT SURE ABOUT THIS--}}
    <h3>{{ $course->teacher()[0]->name }}</h3>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <h1>Toetsen:</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Datum</th>
            <th scope="col">Assesment</th>
            <th scope="col">Uploaden</th>
            <th scope="col">cijfer</th>
        </tr>
        </thead>
        <tbody>

        @foreach($course->tests as $test)
            <tr>
                <th scope="row">#</th>
                <td>{{$test->date}}</td>
                <td>@if($test->assesment) Ja @else Nee @endif</td>
                <td>
                    @if($test->assesment && $test->filename == null)
                        <form action="/upload/assesment/{{$course->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$test->id}}">
                            <input type="file" name="bestand">
                            <button type="submit">uploaden</button>
                        </form>
                    @else
                        {{ $test->filename }}
                    @endif
                </td>
                <td>
                    <form action="/grade/{{ $course->id }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$test->id}}">
                        <input type="number" name="grade" min="1" max="10" value="{{ $test->grade }}">
                        <button type="submit">update</button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>


    <a href="/vakken/test/{{ $course->id }}" class="btn btn-primary">toets maken</a>
@endsection
