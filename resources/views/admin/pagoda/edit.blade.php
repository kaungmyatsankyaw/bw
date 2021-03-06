@extends('layouts.head')

@section('title','Pagoda')

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
          <h5>Pagoda Info</h5>
        </div>
        <div class="widget-content nopadding">
          <form  method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="control-group">
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Name" name="name" value="{{$pagoda->name}}"  required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Address" name="address" value="{{$pagoda->address}}"  required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Credit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Credit Name" name="credit_name" value="{{$pagoda->credit_name}}" required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Phone Number :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Phone Number" name="phone_number" value="{{$pagoda->phone_number}}" required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Latitude :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="latitude" name="latitude" value="{{$pagoda->latitude}}" required autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Longtitude :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Longtitude" name="longtitude" value="{{$pagoda->longtitude}}"  required autofocus>
              </div>
            </div>

            @php
            $images=explode(',',$pagoda->image);
            @endphp
            <div class="control-group">
              <label class="control-label">Previous Image :</label>
              <div class="controls">
                @for($i=0;$i<count($images);$i++)
                  <img src={{ asset('pagoda/'.$images[$i]) }}>
                @endfor
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Image :</label>
              <div class="controls">
                <input type="file" class="span11" placeholder="Name" name="image[]" multiple  autofocus>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Active</label>
              <div class="controls">
                  <select class="" name="active" class="span11">
                    @if($pagoda->active==0)
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
              <textarea name="description" rows="8" cols="80" class="span11" >{{$pagoda->description}}</textarea>
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
