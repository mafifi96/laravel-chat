<nav class="navbar navbar-expand-lg fixed-top navbar-light nav-bar">
    <a class="navbar-brand" href="/">Chat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav ">


            @if (Route::has('login'))

            @auth

            <li class="nav-item">
                <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
            </li>
            @else

            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">

                <a class="nav-link" href="{{route('register') }}" class="">Register</a>

            </li>
            @endif

            @endauth
    </div>
    @endif
    </ul>
    </div>
</nav>
