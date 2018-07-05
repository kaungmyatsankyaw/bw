@extends('layouts.head')

@section('title','Fullmon Notification')

@section('section')


<div class="container-fluid">
    
  <hr>
  <div class="row-fluid">
    <div class="span12">
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
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Notification Info</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name"  required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date :</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="Username" name="date"  required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Message</label></label>
              <div class="controls">
              <textarea name="message" rows="8" cols="80" class="span11"></textarea>

              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">
                  {{ __('Create') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
