
@extends('layouts.head')

@section('title','Home')

@section('section')


<div class="">
    <div class="widget-box widget-plain">
        <div class="center">
            <ul class="stat-boxes2" style="margin-top: 30px !important;">
                <li>
                    <div class="left peity_bar_neutral">
                        <span><h5><i class="icon icon-book" style="color:red"></i>Post</h5></span>
                    </div>
                    <div class="right"><strong>{{ $post_count }}</strong> Posts</div>
                </li>
                <li>
                    <div class="left peity_bar_neutral">
                        <span><h5><i class="icon icon-user"  style="color:red"></i>User</h5></span>
                    </div>
                    <div class="right"><strong>{{ $user_count }}</strong> Users</div>
                </li>
                <li>
                    <div class="left peity_bar_neutral">
                        <span><h5><i class="icon icon-comment commen1"  style="color:red"></i>Comment</h5></span>
                    </div>
                    <div class="right"><strong>{{ $comment_count }}</strong>Comments</div>
                </li>
                <li>
                    <div class="left peity_bar_neutral">
                        <span><h5><i class="icon icon-thumbs-up"  style="color:red"></i>Likes</h5></span>
                    </div>
                    <div class="right"><strong>{{ $like_count }}</strong>Likes</div>
                </li>
                <li>
                    <div class="left peity_bar_neutral">
                        <span><h5><i class="icon icon-bookmark"  style="color:red"></i>Authors</h5></span>
                    </div>
                    <div class="right"><strong>{{ $author_count }}</strong>Authors</div>
                </li>
            </ul>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>Posts By Author</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th>Post Title</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($artists as $artist)
                        <tr>
                            <td>{{ $artist->id }}</td>
                            <td>{{ $artist->artist_name }}</td>
                            <td>{{ $artist->post->count() }}</td>
                            <td>
                                @for($i=0;$i<count($artist->post);$i++)
                                    {{ $artist->post[$i]->title.',' }}
                                    @endfor
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
