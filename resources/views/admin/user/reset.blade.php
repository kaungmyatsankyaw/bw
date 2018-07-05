@extends('layouts.head')

@section('title','Update Password')

@section('section')


<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>

        @endif
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            @csrf

            <div class="control-group">
              <label class="control-label">UserName :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Username" name="username" value="{{ $user->username }}" disabled autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Old Password</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Enter Password" name="old_password" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">New Password</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Enter Password" name="new_password" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Confirm Password</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Confirm Password" name="new_password_confirmation" required>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">
                  {{ __('Update Password') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
