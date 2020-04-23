
<div class="sidenav">
    <h2>StudyMate</h2>
    <a href="/dashboard">Dashboard</a>
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


