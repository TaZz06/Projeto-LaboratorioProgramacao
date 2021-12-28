<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/index') }}">
            First Laravel
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/index')}}" class="nav-link">Index</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/about')}}" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>