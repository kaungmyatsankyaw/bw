@extends('layouts.head')

@section('title','All Artists')

@section('section')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Artists</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Artist Name</th>
                        <th>Artist Type</th>
                        {{--<th>Image</th>--}}
                        <th>Biography</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($artists as $artist)
                            <tr>
                                <td>{{ $artist->id }}</td>
                                <td>{{ $artist->artist_name }}</td>
                                <td>{{ $artist->artist_type }}</td>
                                <td>{{ substr($artist->biography,0,150) }}</td>
                                <td>{{ date('m-d-Y',strtotime($artist->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('/admin/artist/edit/'.$artist->id ) }}" role="button"
                                    class="btn btn-success">Edit</a>
                                    <a href="{{ url('/admin/artist/delete/'.$artist->id) }}" role="button"
                                    class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection