@extends('layouts.app')


@section('content')

    <h1>Dashboard</h1>




    <h3>Vakken overzicht</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Vak</th>
            <th scope="col">Docent</th>
            <th scope="col">Studiepunten</th>
            <th scope="col">Blok</th>
            <th scope="col">Cijfer('s)</th>
            <th scope="col">Assesment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)


        @endforeach
        </tbody>
    </table>


    @php
        $period = 0;
        $blok = 0;
        $secondTable = false;
    @endphp
    @foreach($courses as $course)

        @if($period != ceil($course->period / 2))
            @php
                $period = ceil($course->period / 2);
                $blok = $course->period;
                $secondTable = false;
            @endphp
            <h5>periode {{ $period }}</h5>
            <h5>blok {{ $course->period }}</h5>
            <table>
                <thead>
                <tr>
                    <th scope="col">Vak</th>
                    <th scope="col">Docent</th>
                    <th scope="col">Studiepunten</th>
                    <th scope="col">Blok</th>
                    <th scope="col">Cijfer('s)</th>
                    <th scope="col">Assesment</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->teacher()[0]->name }}</td>
                    <td>{{ $course->ECTS }}</td>
                    <td>{{ $course->period }}</td>
                    <td>
                        @foreach($course->tests as $test)
                            {{ $test->grade }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($course->tests as $test)
                            @if($test->assesment) Ja @else Nee @endif <br>
                        @endforeach
                    </td>
                </tr>
                @else
                    @if($blok == $course->period)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->teacher()[0]->name }}</td>
                            <td>{{ $course->ECTS }}</td>
                            <td>{{ $course->period }}</td>
                            <td>
                                @foreach($course->tests as $test)
                                    {{ $test->grade }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($course->tests as $test)
                                    @if($test->assesment) Ja @else Nee @endif <br>
                                @endforeach
                            </td>
                        </tr>
                    @else
                        @if($secondTable)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->teacher()[0]->name }}</td>
                                <td>{{ $course->ECTS }}</td>
                                <td>{{ $course->period }}</td>
                                <td>
                                    @foreach($course->tests as $test)
                                        {{ $test->grade }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($course->tests as $test)
                                        @if($test->assesment) Ja @else Nee @endif <br>
                                    @endforeach
                                </td>
                            </tr>
                        @else
                            @php
                                $secondTable = true;
                            @endphp
                            <h5>blok {{ $course->period }}</h5>
                            <table>
                                <thead>
                                <tr>
                                    <th scope="col">Vak</th>
                                    <th scope="col">Docent</th>
                                    <th scope="col">Studiepunten</th>
                                    <th scope="col">Blok</th>
                                    <th scope="col">Cijfer('s)</th>
                                    <th scope="col">Assesment</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->teacher()[0]->name }}</td>
                                    <td>{{ $course->ECTS }}</td>
                                    <td>{{ $course->period }}</td>
                                    <td>
                                        @foreach($course->tests as $test)
                                            {{ $test->grade }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($course->tests as $test)
                                            @if($test->assesment) Ja @else Nee @endif <br>
                                        @endforeach
                                    </td>
                                </tr>
                        @endif

                    @endif

                </tbody>
            </table>
        @endif
    @endforeach



@endsection
