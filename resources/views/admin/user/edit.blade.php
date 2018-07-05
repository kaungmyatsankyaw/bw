@extends('layouts.head')

@section('title','User')

@section('section')


    <div class="container-fluid">


        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>User Edit</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{ url('/admin/user/edit/'.$user->id ) }}" method="post" class="form-horizontal" >
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Title :</label>
                        <div class="controls">
                            <input type="text" class="span11" value="{{ $user->name }}" disabled  name="title"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admin Level:</label>
                        <div class="controls">
                            <select id="" class="span11" name="admin_level">
                               @if($user->admin_level==0)
                                    <option value="0" selected>New User</option>
                                    <option value="2">Confirm And Delete</option>
                                    <option value="3">Upload</option>
                                   @elseif($user->admin_level==2)
                                    <option value="0" >New User</option>
                                    <option value="2" selected>Confirm And Delete</option>
                                    <option value="3">Upload</option>
                                   @elseif($user->admin_level==3)
                                    <option value="0" selected>New User</option>
                                    <option value="2">Confirm And Delete</option>
                                    <option value="3" selected>Upload</option>
                                   @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-actions " style="margin-left: 180px">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    @endsection