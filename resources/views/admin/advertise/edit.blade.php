@extends('layouts.head')

@section('title','Advertise')

@section('section')


<div class="container-fluid">

  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Advertise Info</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name"  required autofocus value="{{$advertise->name}}">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Latitude :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="latitude"  required autofocus value="{{$advertise->latitude}}">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Longtitude :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="longtitude"  required autofocus value="{{$advertise->longtitude}}">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Active</label>
              <div class="controls">
                  <select class="" name="active" class="span11">
                    @if($advertise->active==0)
                      <option value="0" selected>Not Active</option>
                      <option value="1">Active</option>
                      @else
                      <option value="0">Not Active</option>
                      <option value="1" selected>Active</option>
                    @endif
                  </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Description</label></label>
              <div class="controls">
              <textarea name="description" rows="8" cols="80" class="span11" value="">{{$advertise->description}}</textarea>
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
