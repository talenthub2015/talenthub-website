<header>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="{!! asset('images/talenthub_logo.png') !!}"></a>
                </div>

                @if(Auth::user())
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('admin/home')}}">Home</a></li>
                            <li class="has-dropdown"><a href>Database</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/viewManager')}}">View Managers</a></li>
                                    <li><a href="{{url('admin/addManager')}}">Add Managers</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="pull-right">
                                <a href="{!!  url('auth/logout') !!}">Logout</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </nav>
    </div>
</header>
