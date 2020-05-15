@extends("layouts.app")

@section("content")
    <table class="table">
        <thead>
            <tr scope="row">
                <th scope="col">#</th>
                <th scope="col">vak</th>
                <th scope="col">Deadline tijd</th>
                <th scope="col">type</th>
                <th scope="col">tags</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($deadlines as $deadline)
                <tr scope="row">
                    <td scope="col"><a href="/deadline/{{$deadline->id}}">{{$deadline->id}}</a></td>
                    @foreach($courses as $course)
                        @if($course->id == $deadline->course_id)
                            <td scope="col">{{$course->name}}</td>
                        @endif
                    @endforeach
                    <td scope="col">{{$deadline->datetime}}</td>
                    @if($deadline->type == 0)
                        <td>Tentamen</td>
                    @else
                        <td>Opdrachten</td>
                    @endif
                    <td scope="col">
                        @foreach(explode(",", $deadline->tags) as $tag)
                            <span class="tagged">{{$tag}}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="/deadline/{{$course->id}}" onclick="event.preventDefault(); document.getElementById('delete{{$course->id}}').submit()">X</a>
                        <form action="/deadline/{{$course->id}}" method="post" id="delete{{$course->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/deadline/create" class="btn btn-primary">Maak deadline</a>
@endsection
