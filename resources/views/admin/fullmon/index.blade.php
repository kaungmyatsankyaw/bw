@extends('layouts.head')

@section('title','Notification')

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
                <a href="{{ url('/admin/fullmon/create')}}" role="button" class="btn btn-success mt-3 ml-3">Create Fullmon Notification</a>
                @endif
            </div>
            <div class="widget-content nopadding">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Message</th>
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
                    @foreach($fullmons as $fullmon)
                        @php($i++)
                        <tr class="">
                            <td>{{ $i }}</td>
                            <td>{{ $fullmon->name}}</td>
                            <td>{{ $fullmon->date}}</td>
                            <td>{{Str::substr( $fullmon->message,0,200)}}</td>
                            <td>
                                @if($fullmon->active==0)
                                Not Active
                                @else
                                Active
                                @endif
                            </td>
                            @if($level==1)
                                <td><a href="{{ url('/admin/fullmon/edit/'.$fullmon->id) }}" role="button"
                                       class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ url('/admin/fullmon/'.$fullmon->id.'/delete') }}" role="button"
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
