<div class="left_menu_container">
    <ul class="nav">
        <li><a href="{{url('profile/edit')}}">Personal Information</a></li>
        @if(\talenthub\Repositories\SiteConstants::isTalent(Session::get(\talenthub\Repositories\SiteSessions::USER_TYPE)))
        <li><a href="{{url('profile/editCV')}}">CV Information</a></li>
        @endif
        <li><a href="">Settings</a></li>
    </ul>

</div>