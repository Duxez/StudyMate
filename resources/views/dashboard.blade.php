@extends('layouts.app')


@section('content')

    <h1>Dashboard</h1>





    <table class="table">
        <thead>
        <tr>
            <th scope="col">Vak</th>
            <th scope="col">Docent</th>
            <th scope="col" width="10%">Studiepunten</th>
            <th scope="col">Blok</th>
            <th scope="col">Cijfer('s), Assesment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->teacher()[0]->name }}</td>
                <td>{{ $course->ECTS }}</td>
                <td>{{ $course->period }}</td>
                <td>
                    @foreach($course->tests as $test)
                        {{ $test->grade }}, @if($test->assesment) Ja @else Nee @endif <br>
                    @endforeach
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>



@endsection
