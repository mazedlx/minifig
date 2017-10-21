<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ url()->to('images/lego.png') }}" alt="Lego">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ set_active('/') }}"><a class="nav-link" href="{{ url()->to('/') }}">Home</a></li>
            <li class="nav-item {{ set_active('minifigs') }}"><a class="nav-link" href="{{ url()->to('minifigs') }}">Minifigs</a></li>
            <li class="nav-item {{ set_active('sets') }}"><a class="nav-link" href="{{ url()->to('sets') }}">Sets</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
        @cannot('create', Minfig::class)
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
        @endcannot
        @can('create', Minfig::class)
            <li class="nav-item">
                <a
                    class="nav-link" href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >
                    Logout
                </a>
            </li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endcan
        </ul>
    </div>
</nav>
