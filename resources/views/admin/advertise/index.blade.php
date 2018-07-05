@extends('layouts.head')

@section('title','Advertise')

@section('section')


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
                <h5>Notifications</h5>
                @if(Auth::user()->admin_level==1)
                <a href="{{ url('/admin/advertise/create')}}" role="button" class="btn btn-success mt-3 ml-3">Create Advertise</a>
                @endif
            </div>
            <div class="widget-content nopadding">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Latitude</th>
                        <th>Longtitude</th>
                        <th>Description</th>
                        <th>Active</th>
                        @php
                        $level=Auth::user()->admin_level;
                        @endphp
                        @if($level==1)
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @php
                        $i=0;
                    @endphp
                    @foreach($advertises as $advertise)
                        @php($i++)
                        <tr class="">
                            <td>{{ $i }}</td>
                            <td>{{ $advertise->name}}</td>
                            <td>{{ $advertise->latitude}}</td>
                            <td>{{ $advertise->longtitude}}</td>
                            <td>{{ $advertise->description}}</td>
                            <td>
                                @if($advertise->active==0)
                                Not Active
                                @else
                                Active
                                @endif
                            </td>
                            @if($level==1)
                                <td><a href="{{ url('/admin/advertise/edit/'.$advertise->id) }}" role="button"
                                       class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ url('/admin/advertise/'.$advertise->id.'/delete') }}" role="button"
                                       class="btn btn-danger">Delete</a></td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
