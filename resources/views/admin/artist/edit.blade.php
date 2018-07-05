@extends('layouts.head')

@section('title','Artist Edit')

@section('section')

    <style>
        .control-group{
            margin: 5px;
        }
    </style>

    <div class="container-fluid">

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Artist Create</h5>
            </div>
            <div class="widget-content nopadding">
                @foreach($errors as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                <form action="{{ url('/admin/artist/edit/'.$artist->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Name :</label>
                        <div class="controls">
                            <input type="text" class="span11" placeholder="Enter Title"  name="name" value="{{ $artist->artist_name  }}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Type :</label>
                        <div class="controls">
                            <select  id="" class="span11" name="type">
                               @if($artist->artist_type=='monk')
                                <option value="monk" selected>Monk</option>
                                <option value="people">People</option>
                                   @else
                                    <option value="monk" >Monk</option>
                                    <option value="people" selected>People</option>
                                   @endif
                            </select>
                        </div>
                    </div>
                    <div class="control-group mb-1">
                        <div class="control-label">Old Image</div>
                        <div class="controls">
                            <img src="{{ asset('/artist/'.$artist->artist_image) }}" alt="" class="span6" style="width: 150px;height: 150px">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Artist Image</label>
                        <div class="controls">
                            <input type="file" name="file" id="imgInp">
                        </div>
                        <div class="controls">
                            <img id="blah" src="#" alt="your image" style="width: 200px;height: 200px" />

                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">Biography</label>
                            {{--<div class="controls">--}}
                            <div class="controls">
                                <textarea class="textarea_editor span11" rows="6" placeholder="Enter Description ..." name="biography">
                                    {{ $artist->biography }}
                                </textarea>
                            </div>
                            {{--</div>--}}
                            <div class="form-actions " style="margin-left: 200px">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                </form>
            </div>
        </div>


    </div>


@endsection