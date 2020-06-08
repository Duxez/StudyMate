@extends('layouts.app')


@section('content')

    <h1>Dashboard</h1>





    <table class="table">
        <thead>
        <tr>
            <th scope="col">Vak</th>
            <th scope="col">Docent</th>
            <th scope="col">Cijfer</th>
        </tr>
        </thead>
        <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->teacher()[0]->name }}</td>
            <td>{{ $course->tests[0]->grade }}</td>
        </tr>

    @endforeach
        </tbody>
    </table>



    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

@endsection
