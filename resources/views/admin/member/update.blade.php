@extends('layouts.head')

@section('title','Update Donation')

@section('section')

<div class="container-fluid">
    <div class="widget-box">

        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>Members</h5>
            <h3>THis is Donation</h3>
        </div>
        <div class="widget-content nopadding">

          <form method="post" class="form-horizontal" >
              {{ csrf_field() }}
              <div class="control-group">
                  <label class="control-label">Amount :</label>
                  <div class="controls">
                      <input type="number" class="span6" name="amount" value="{{$donation->money}}" required/>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">Date :</label>
                  <div class="controls">
                      <input type="date" name="date" value="{{$donation->date}}"  required>
                  </div>
              </div>
              <div class="form-actions " style="margin-left: 200px">
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection
