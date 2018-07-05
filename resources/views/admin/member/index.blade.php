@extends('layouts.head')

@section('title','Members')

@section('section')


    <div class="container-fluid">
        <div class="widget-box">

            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Members</h5>
            </div>
            <div class="widget-content nopadding">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        @php
                        $level=Auth::user()->admin_level;
                        @endphp
                        @if($level==1)
                            <th>Edit</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @php
                        $i=0;
                    @endphp
                    @foreach($users as $user)
                    @php
                        $i++;
                    @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name}}</td>

                            @if($level==1)
                                <td><a href="{{ url('/admin/member/'.$user->id) }}" role="button"
                                       class="btn btn-primary">Edit</a></td>

                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
