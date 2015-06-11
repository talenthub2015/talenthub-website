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
                        <li><a href="{!!  url('/')  !!}">Updates</a></li>
                        <li class="has-dropdown"><a href="{!!  url('connection') !!}">Information</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! url('profile') !!}"><span class="glyphicon glyphicon-user"></span> {!! Session::get(\talenthub\Repositories\SiteSessions::USER_NAME) !!} Profile</a></li>
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-circle-arrow-right"></span> Request Recommendation</a></li>
                                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT)
                                    <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-hand-right"></span> Scholarship Process Help</a></li>
                                @endif
                                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO)
                                    <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-hand-right"></span> Professional Process Help</a></li>
                                @endif
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-question-sign"></span> Help Centre</a></li>
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-lock"></span> Privacy Settings</a></li>
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-cog"></span> General Settings</a></li>
                                <li><a href="{!! url('profile/edit') !!}"><span class="glyphicon glyphicon-list-alt"></span> Policies</a></li>
                            </ul>
                        </li>
                        <li><a href="{!!  url('database')  !!}">Database</a></li>
                        <li class="has-dropdown"><a href="{!!  url('profile')  !!}">Notifications</a>
                            <ul class="dropdown-menu">
                                <li><a href="">Update 1</a></li>
                                <li><a href="">Update 2</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="{!!  url('messages')  !!}">Messages</a>
                        </li>
                        <li class="has-dropdown"><a href="{!!  url('profile/'.Session::get(\talenthub\Repositories\SiteSessions::USER_ID).'/favourites')  !!}">Favourites</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><div><input type="text"></div></li>
                        <li class="has-dropdown pull-right">
                            <div class="dropdown"><span class="caret" data-toggle="dropdown"></span>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="{!!  url('settings') !!}">Settings</a></li>
                                    <li><a href="{!!  url('auth/logout') !!}">Logout</a></li>
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
