
<div class="sidenav">
    <h2>StudyMate</h2>
    <a href="/dashboard">Dashboard</a>
    @auth
        @if(auth()->user()->hasRole('admin'))
            <a href="/cijfers">Cijfers</a>
            <a href="/vakken">Vakken</a>
            <a href="/docenten">Docenten</a>
        @elseif(auth()->user()->hasRole('deadline manager'))
            <a href="/deadline">Deadlines</a>
            <a href="#">Nieuwe deadline</a>
        @endif
    @endauth

    @auth
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    @else
        <a href="login">Inloggen</a>
    @endauth
</div>


