@extends('layouts.head')

@section('title','User')

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
                <h5>Admins</h5>
                @if(Auth::user()->admin_level==1)
                <a href="{{ url('/admin/user/register')}}" role="button" class="btn btn-success mt-3 ml-3">Register User</a>
                @endif
            </div>
            <div class="widget-content nopadding">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Access</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Reset Passowrd</th>
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
                    @foreach($users as $user)
                       
                        <tr>
                            <td>{{ $i++ }}</td>
                            
                            <td>{{ $user->username }}</td>
                            <td>
                                @if($user->admin_level==0)
                                    <button class="btn btn-sm ">New User</button>
                                @elseif($user->admin_level==2)
                                    <button class="btn btn-sm btn-primary">Confirm and Delete</button>
                                @elseif($user->admin_level==3)
                                    <button class="btn btn-sm btn-success">Can Upload Post</button>
                                @endif
                            </td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>
                             @if($user->id==Auth::user()->id)
                              <a href="{{url('/admin/user/resetpassword/'.$user->id)}}"
                                role="button" class="btn btn-success">Reset Passowrd</a>
                                @else
                                <small>You cannot change other user password</samll>
                             @endif        
                            </td>
                            @php
                            $level=Auth::user()->admin_level;
                            @endphp
                            @if($level==1)
                                <td><a href="{{ url('/admin/user/edit/'.$user->id) }}" role="button"
                                       class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ url('/admin/user/delete/'.$user->id) }}" role="button"
                                       class="btn btn-danger">Delete</a></td>
                                       @else
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
