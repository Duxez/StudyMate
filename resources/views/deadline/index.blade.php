@extends("layouts.app")

@section("head")
    <style>
        select, button, table {
            margin-top: 15px;
        }
    </style>
@endsection

@section("content")
    <a href="/deadline/create" class="btn btn-primary">Maak deadline</a>
    <select class="form-control" id="sortOn">
        <option value="teachers.name">Docent</option>
        <option value="courses.name">Vak</option>
        <option value="deadlines.datetime">Deadline Tijd</option>
        <option value="deadlines.type">Type</option>
    </select>
    <select class="form-control" id="direction">
        <option value="asc">Oplopend</option>
        <option value="desc">Aflopend</option>
    </select>
    <button class="btn btn-primary" onclick="sort()">Sorteer</button>
    <table class="table">
        <thead>
            <tr scope="row">
                <th scope="col">#</th>
                <th scope="col">Vak</th>
                <th scope="col">Deadline tijd</th>
                <th scope="col">Type</th>
                <th scope="col">Docent</th>
                <th scope="col">Tags</th>
                <th scope="col">Afvinken</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($deadlines as $deadline)
                <tr scope="row">
                    <td scope="col"><a href="/deadline/{{$deadline->id}}">{{$deadline->id}}</a></td>
                    <td scope="col">{{\Illuminate\Support\Facades\Crypt::decrypt($deadline->name)}}</td>
                    <td scope="col">{{$deadline->datetime}}</td>
                    @if($deadline->type == 0)
                        <td>Tentamen</td>
                    @else
                        <td>Opdrachten</td>
                    @endif
                    <td scope="col">{{\Illuminate\Support\Facades\Crypt::decrypt($deadline->teacherName)}}</td>
                    <td scope="col">
                        @foreach(explode(",", $deadline->tags) as $tag)
                            <span class="tagged">{{$tag}}</span>
                        @endforeach
                    </td>
                    <td>
                        <input type="checkbox" class="finished" data-id="{{$deadline->id}}" />
                    </td>
                    <td>
                        <a href="/deadline/{{$deadline->courseId}}" onclick="event.preventDefault(); document.getElementById('delete{{$deadline->courseId}}').submit()">X</a>
                        <form action="/deadline/{{$deadline->courseId}}" method="post" id="delete{{$deadline->courseId}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$deadlines->links()}}
    <table class="table">
        <thead>
        <tr scope="row">
            <th scope="col">#</th>
            <th scope="col">Vak</th>
            <th scope="col">Deadline tijd</th>
            <th scope="col">Type</th>
            <th scope="col">Docent</th>
            <th scope="col">Tags</th>
            <th scope="col">Afvinken</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($done as $deadline)
            <tr scope="row">
                <td scope="col"><a href="/deadline/{{$deadline->id}}">{{$deadline->id}}</a></td>
                <td scope="col">{{\Illuminate\Support\Facades\Crypt::decrypt($deadline->name)}}</td>
                <td scope="col">{{$deadline->datetime}}</td>
                @if($deadline->type == 0)
                    <td>Tentamen</td>
                @else
                    <td>Opdrachten</td>
                @endif
                <td scope="col">{{\Illuminate\Support\Facades\Crypt::decrypt($deadline->teacherName)}}</td>
                <td scope="col">
                    @foreach(explode(",", $deadline->tags) as $tag)
                        <span class="tagged">{{$tag}}</span>
                    @endforeach
                </td>
                <td>
                    ✔
                </td>
                <td>
                    <a href="/deadline/{{$deadline->courseId}}" onclick="event.preventDefault(); document.getElementById('delete{{$deadline->courseId}}').submit()">X</a>
                    <form action="/deadline/{{$deadline->courseId}}" method="post" id="delete{{$deadline->courseId}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$deadlines->links()}}
@endsection
@section('scripts')
    <script>
        let sortOn = document.getElementById('sortOn');
        let direction = document.getElementById('direction');

        const urlParams = new URLSearchParams(window.location.search);
        console.log(urlParams.get('sortOn'));
        sortOn.value = urlParams.get('sortOn');
        direction.value = urlParams.get('direction');

        function sort()
        {
            window.location.href =`/deadlinesorted?sortOn=${sortOn.value}&direction=${direction.value}`;
        }

        let checkBoxes = document.getElementsByClassName("finished");
        for(let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].addEventListener("change", () => {
                console.log("hi");
                if(checkBoxes[i].checked) {
                    let id = checkBoxes[i].getAttribute('data-id');
                    window.location.href = `/deadlinefinished/${id}`;
                }
            });
        }
    </script>
@endsection
