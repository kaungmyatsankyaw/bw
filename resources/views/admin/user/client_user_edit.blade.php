@extends('layouts.head')

@section('title','Update')

@section('section')


<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name" value="{{ $user->name }}" required disabled autofocus>

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Facebook ID :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Username" name="username" value="{{$user->fb_id}}" disabled autofocus>

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Google Id</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter Password" value="{{$user->gplus_id}}" required disabled>

              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Phone Number</label>
              <div class="controls">
                <input id="phone_number" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} span11" name="phone_number" value="{{ $user->phone_number }}" required autofocus disabled>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value="{{ $user->address }}" required autofocus disabled>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Member</label>
            <div class="controls">
              <select class="" name="member" class="span11">
                @if($user->member==0)
                  <option value="0" selected>Not Member</option>
                  <option value="1">Member</option>
                  @else
                  <option value="0">Not Member</option>
                  <option value="1" selected>Member</option>
                @endif
              </select>
          </div>
        </div>


            <div class="form-actions">
              <button type="submit" class="btn btn-primary">
                  {{ __('Update') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
