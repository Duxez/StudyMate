{{--<ul class="nav justify-content-center">--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">Active</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">Link</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">Link</a>--}}
{{--    </li>--}}

{{--    @auth--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>--}}
{{--        </li>--}}

{{--         logout must be POST with csrf--}}
{{--        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>--}}
{{--    @else--}}
{{--        <a href="login">login</a>--}}
{{--        <a href="register">register</a>--}}
{{--    @endauth--}}
{{--</ul>--}}


<div class="sidenav">
    <h2>StudyMate</h2>
    <a href="#about">Dashboard</a>
    @auth
        <a href="/cijfers">Cijfers</a>
        <a href="/vakken">Vakken</a>
        <a href="/docenten">Docenten</a>
    @endauth

    @auth
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    @else
        <a href="login">Inloggen</a>
    @endauth
</div>


