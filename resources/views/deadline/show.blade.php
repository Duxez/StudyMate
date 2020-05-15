@extends("layouts.app")

@section("content")
    <p>Voor het vak: {{\App\Deadline::course($deadline->course_id)[0]->name}}</p>
    @if($deadline->type == 0)
        <p>Tentamen op {{$deadline->datetime}}</p>
    @else
        <p>Opdracht deadline voor {{$deadline->datetime}}</p>
    @endif
    <p>Met de tags: {{$deadline->tags}}</p>

    <a href="/deadline/{{$deadline->id}}/edit" class="btn btn-primary">Bewerk deadline</a>
@endsection
