<header>
    <div class="container"
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Laravel</a>
                </div>

                @if(Auth::user())
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('connection')}}">Network</a></li>
                        <li class="has-dropdown"><a href="{{ url('profile') }}">Profile</a>
                            <div class="dropdown"><span class="caret" data-toggle="dropdown"></span>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><a href="{{ url('settings')}}">Settings</a></li>
                                <li><a href="{{ url('auth/logout')}}">Logout</a></li>
                            </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </div>
</header>
