@extends('layouts.head')

@section('title','Post Analyst')

@section('section')


    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Posts Status</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post Title</th>

                        <th>Like Count</th>
                        <th>Comment Count</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->likes->count() }}</td>
                            <td>{{ $post->comment->count() }}</td>
                            <td>{{ date('d-m-Y',strtotime($post->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection