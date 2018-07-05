<div id="header">
    <img src="{{url(asset('img/barlogo.png'))}}" style="height:80px;width:75px;margin-left:50px">
</div>


<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('/logout') }}"><i class="icon-key"></i> Log Out</a></li>

            </ul>
        </li>
    </ul>
</div>



