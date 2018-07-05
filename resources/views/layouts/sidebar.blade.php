<div id="sidebar">
    <ul>
        {{--@if(Auth::user()->id==0)--}}

        {{--@else--}}
        <li class="index"><a href="{{ url('/admin') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="user"><a href="{{ url('/admin/user') }}"><i class="icon icon-home"></i> <span>Admin</span></a>
        </li>
        <li class="client_user"><a href="{{ url('/admin/client_user') }}"><i class="icon icon-home"></i>
                <span>User</span></a>
        </li>
        <li class="cate"><a href="{{ url('/admin/cate') }}"><i class="icon icon-home"></i> <span>Category</span></a>
        </li>
        <li class="post_analyst"><a href="{{ url('/admin/postanalyst') }}"><i class="icon icon-home"></i> <span>Post Analyst</span></a>
        </li>
        <li class="submenu post"><a href="#"><i class="icon icon-info-sign"></i> <span>Post</span> </a>
            <ul>
                <li><a href="{{ url('/admin/post') }}">All Post</a></li>
                @php
                    $level=Auth::user()->admin_level;
                @endphp
                @if($level==1 or $level==3)
                    <li><a href="{{ url('/admin/post/create') }}">Create</a></li>
                @endif
            </ul>
        </li>
        <li class="submenu artist"><a href="#"><i class="icon icon-info-sign"></i> <span>Artist</span> </a>
            <ul>
                <li><a href="{{ url('/admin/artist') }}">All Artist</a></li>
                <li><a href="{{ url('/admin/artist/create') }}">Create</a></li>
            </ul>
        </li>
        <li class="fullmon"><a href="{{ url('/admin/fullmon') }}"><i class="icon icon-home"></i> <span>Fullmon Notifications</span></a>
        </li>
        <li class="advertise"><a href="{{ url('/admin/advertise') }}"><i class="icon icon-home"></i> <span>Advertise</span></a>
        </li>
        <li class="pagoda"><a href="{{ url('/admin/pagoda') }}"><i class="icon icon-home"></i> <span>Pagoda</span></a>
        </li>
        <li class="member"><a href="{{ url('/admin/member') }}"><i class="icon icon-home"></i> <span>Member</span></a>
        </li>
        <li class="comment"><a href="{{ url('/admin/post/comment') }}"><i class="icon icon-comment"></i> <span>Post Comment</span></a>
        </li>
        {{--@endif--}}
    </ul>
</div>
