

<ul class="nav">
    <li class="{{$active_link == 1 ? "active" : "" }}"><a href="{{url('messages')}}">Inbox</a></li>
    <li class="{{$active_link == 2 ? "active" : "" }}"><a href="{{url('sentMessages')}}">Sent</a></li>
    <!--li class="{{$active_link == 3 ? "active" : "" }}"><a href="{{url('trashMessages')}}">Sent</a></li-->
</ul>