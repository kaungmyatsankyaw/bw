@extends('layouts.head')

@section('title','All Post')

@section('section')

@php
$level=Auth::user()->admin_level;
@endphp

    <div class="container-fluid">
        <div class="widget-box">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Posts</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post Title</th>
                        <th>Post Category</th>
                        <th>Post Artist</th>
                        <th>Post Author</th>
                        @if($level==1 or $level==2)
                            <th>Status</th>
                            <th>Action</th>
                        @endif
                        <th>Created Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ url('/admin/post/detail/'.$post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->artist->artist_name }}</td>
                            <td>{{ $post->user->username }}</td>
                           @if($level==1 or $level==2)
                                <td>
                                    @if($post->public==1)
                                        <a href="{{ url('/admin/post/unpublish/'.$post->id) }}" role="button" class="btn btn-primary">Unpublish</a>
                                    @else
                                        <a href="{{ url('/admin/post/publish/'.$post->id) }}" role="button" class="btn btn-danger">Publish</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/post/edit/'.$post->id ) }}" role="button"
                                       class="btn btn-success">Edit</a>
                                    <a href="{{ url('/admin/post/delete/'.$post->id) }}" role="button"
                                       class="btn btn-danger">Delete</a>
                                </td>
                               @endif
                            <td>{{ date('d-m-Y',strtotime($post->created_at)) }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection