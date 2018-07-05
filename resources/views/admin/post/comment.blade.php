@extends('layouts.head')

@section('title','Comment')

@section('section')


    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Like Status</h5>
            </div>
            <div class="widget-content nopadding">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post Title</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->description }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td><a href="{{ url('/admin/comment/delete/'.$comment->id) }}" role="button"
                                class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection