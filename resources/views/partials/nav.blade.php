<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img src="{{ url()->to('images/lego.png') }}" alt="Lego">
        </a>
        <button
            type="button"
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#navbar"
            aria-expanded="false"
        >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
            <li class="{{ set_active('/') }}"><a href="{{ url()->to('/') }}">Home</a></li>
            <li class="{{ set_active('minifigs') }}"><a href="{{ url()->to('minifigs') }}">Minifigs</a></li>
            <li class="{{ set_active('sets') }}"><a href="{{ url()->to('sets') }}">Sets</a></li>
        </ul>
        <ul class="nav navbar-nav">
            @cannot('create', Minfig::class)
            <li>
                <a href="{{ url('/login') }}">Login</a>
            </li>
            @endcannot
            @can('create', Minfig::class)
            <li>
                <a
                    href="{{ url('/logout') }}"
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
