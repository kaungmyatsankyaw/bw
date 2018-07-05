@extends('layouts.head')

@section('title','User')

@section('section')


    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Users</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Member</th>
                        <th>Type(Register && Login)</th>
                        <th>Phone Number</th>
                        <th>Facebook Id</th>
                        <th>Gplus Id</th>
                        <th>Register Time</th>
                        @php
                          $level=Auth::user()->admin_level;
                          @endphp

                          @if($level==1)
                          <th>Update</th>
                          <th>Delete</th>
                          @endif
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @php
                        $i=0;
                    @endphp
                    @foreach($users as $user)
                        @php($i++)
                        <tr class="">
                            <td>{{ $i }}</td>
                            <td
				@if($user->member==1)
				style="color:red !important"
				@endif
				>{{ $user->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                              @if($user->member==0)
                                No member
                                @else
                                Member
                              @endif
                            </td>
                            <td>
                              @if($user->type==1)
                                Facebook Login
                                @elseif($user->type==2)
                                Phone Number Login
                                @elseif($user->type==3)
                                Google Login
                                @endif
                            </td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->fb_id }}</td>
                            <td>{{ $user->gplus_id }}</td>
                            <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                            @if($level==1)
                            <td><a role="button" class="btn btn-primary" href="{{url('/admin/clientuser/edit/'.$user->id)}}">Update</a></td>
                            <td><a role="button" class="btn btn-danger" href="{{url('/admin/clientuser/delete/'.$user->id)}}">Delete</a></td>

                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
