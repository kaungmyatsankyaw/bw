@extends('layouts.head')

@section('title','Pagodas')

@section('section')

@php
use Illuminate\Support\Str;
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
                <h5>Notifications</h5>
                @if(Auth::user()->admin_level==1)
                <a href="{{ url('/admin/pagoda/create')}}" role="button" class="btn btn-success mt-3 ml-3">Create Pagoda</a>
                @endif
            </div>
            <div class="widget-content nopadding">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Credit Name</th>
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
                    @foreach($pagodas as $pagoda)
                        @php($i++)
                        <tr class="">
                            <td>{{ $i }}</td>
                            <td>{{ $pagoda->name}}</td>
                            <td>{{ $pagoda->address}}</td>
                            <td>{{ $pagoda->phone_number}}</td>
                            <td>{{ $pagoda->credit_name}}</td>
                            <td>{{ $pagoda->latitude}}</td>
                            <td>{{ $pagoda->longtitude}}</td>
                            <td>{{ Str::substr($pagoda->description,0,200) }}</td>
                            <td>
                                @if($pagoda->active==0)
                                Not Active
                                @else
                                Active
                                @endif
                            </td>
                            @if($level==1)
                                <td><a href="{{ url('/admin/pagoda/edit/'.$pagoda->id) }}" role="button"
                                       class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ url('/admin/pagoda/delete/'.$pagoda->id) }}" role="button"
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
