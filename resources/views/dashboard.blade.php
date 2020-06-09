@extends('layouts.app')


@section('content')

    <h1>Dashboard</h1>



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
                $rows = 0;
            @endphp
            <h1>periode {{ $period }}</h1>
            <h2>blok {{ $course->period }}</h2>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percent[$course->period - 1]  }}%" aria-valuenow="{{ $percent[$course->period - 1]  }}" aria-valuemin="0"
                     aria-valuemax="100">{{ $percent[$course->period - 1] }}%
                </div>
            </div>

            <p>Aantal te behalen punten: {{ $points[$course->period - 1]->points }}</p>
            <p>Behaalde studiepunten: {{ $studyPoints[$course->period - 1] }}</p>

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
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->teachers->name }}</td>
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
                @php
                    $rows++;
                @endphp
                @else
                    @if($blok == $course->period)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->teachers->name }}</td>
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
                        @php
                            $rows++;
                        @endphp
                    @else
                        @if($rows == 1)
                </tbody>
            </table>
        @endif
        @if($secondTable)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->teachers->name }}</td>
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
            <h2>blok {{ $course->period }}</h2>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percent[$course->period - 1]  }}%" aria-valuenow="{{ $percent[$course->period - 1]  }}" aria-valuemin="0"
                     aria-valuemax="100">{{ $percent[$course->period - 1] }}%
                </div>
            </div>

            <p>Aantal te behalen punten: {{ $points[$course->period - 1]->points }}</p>
            <p>Behaalde studiepunten: {{ $studyPoints[$course->period - 1] }}</p>


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
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->teachers->name }}</td>
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
