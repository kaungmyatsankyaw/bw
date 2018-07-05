@extends('layouts.head')

@section('title',$post->title)

@section('section')


    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>{{ $post->title }}</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered ">
                    <tr>
                        <td>Id</td>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td>{{ $post->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $post->category->title }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="{{ asset('/post/image/'.$post->image) }}" alt=""></td>
                    </tr>
                    <tr>
                        <td>Post Level</td>
                        <td>{{ $post->post_level }}</td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            @if($post->public==0)
                                Not Public
                            @else
                                Public
                            @endif
                        </td>
                    </tr>
                    @if($post->post_level==1)
                        <tr>
                            <td>Description</td>
                            <td>{{ $post->description }}</td>
                        </tr>
                    @elseif($post->post_level==2)
                        <tr>
                            <td>Audio</td>
                            <td>
                                <audio src="{{ asset('/post/audio/'.$post->audio) }}"></audio>
                            </td>
                        </tr>
                    @elseif($post->post_level==3)
                        <tr>
                            <td>Description</td>
                            <td>{{ $post->description }}</td>
                        </tr>
                        <tr>
                            <td>Audio</td>
                            <td>
                                <audio src="{{ asset('/post/audio/'.$post->audio) }}" controls
                                       style=""></audio>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="2"><a href="{{ url('/admin/post') }}" role="button" class="btn btn-outline-dark">Back</a></td>
                    </tr>
                </table>

            </div>
        </div>

@endsection