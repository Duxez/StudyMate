@extends("layouts.app")

@section("head")
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/default.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/default.date.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/default.time.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bootstrap-tagsinput.css")}}">
@endsection

@section("content")

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach

    @endif

    <form action="/deadline/{{$deadline->id}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="course">Vak:
                <select class="form-control" name="course" required>
                    @foreach($courses as $course)
                        @if($course->id == $deadline->course_id)
                            <option value="{{$course->id}}" selected>{{$course->name}}</option>
                        @else
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            <div class="form-check">
                @if($deadline->type == 0)
                    <input id="tentamen" type="radio" class="form-check-input" value="0" name="type" checked>
                @else
                    <input id="tentamen" type="radio" class="form-check-input" value="0" name="type">
                @endif
                <label for="tentamen" class="form-check-label">
                    Tentamen
                </label>
            </div>
            <div class="form-check">
                @if($deadline->type == 1)
                    <input type="radio" id="opdrachten" class="form-check-input" name="type" value="1" checked>
                @else
                    <input type="radio" id="opdrachten" class="form-check-input" name="type" value="1">
                @endif
                <label for="opdrachten" class="form-check-label">
                    Opdrachten
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Datum</label>
            <input id="exampleDate" class="datepicker form-control" name="date" type="text" placeholder="kies een datum" required value="{{explode(' ', $deadline->datetime)[0]}}" />
            <label for="time">Tijd</label>
            <input id="exampleTime" class="timepicker form-control" type="time" name="time" placeholder="kies een tijd" required value="{{explode(":", explode(' ', $deadline->datetime)[1])[0]}}:{{explode(":", explode(' ', $deadline->datetime)[1])[1]}}" />
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label><br/>
            <input id="tags" class="form-control" type="text" name="tags" data-role="tagsinput" placeholder="Splits tags met een ," value="{{$deadline->tags}}">
        </div>
        <button class="btn btn-primary" type="submit">Bewerk deadline</button>
    </form>
@endsection
@section("scripts")
    <script src="{{asset("assets/js/picker.js")}}"></script>
    <script src="{{asset("assets/js/picker.date.js")}}"></script>
    <script src="{{asset("assets/js/picker.time.js")}}"></script>
    <script src="{{asset("assets/js/nl_NL.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-tagsinput.js")}}"></script>
    <script>
        $('.datepicker').pickadate({
            format: 'dddd, dd mmm, yyyy',
            formatSubmit: 'yyyy-mm-dd'
        });

        $('.timepicker').pickatime({
            format: 'HH:i'
        });
    </script>
@endsection
