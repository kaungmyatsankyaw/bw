@extends('layouts.head')

@section('title','Artist Create')

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
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Name :</label>
                        <div class="controls">
                            <input type="text" class="span11" placeholder="Enter Title"  name="name"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Type :</label>
                        <div class="controls">
                            <select  id="" class="span11" name="type">
                                <option value="" selected>Select Type</option>
                                <option value="monk">Monk</option>
                                <option value="people">People</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Artist Image</label>
                        <div class="controls">
                            {{--<div class="uploader" id="uniform-undefined">--}}
                                <input type="file" name="file" id="imgInp">
                            <img id="blah" src="#" alt="your image" style="width: 200px;height: 200px" />
                                {{--<span class="filename">No file selected</span><span class="action">Choose File</span></div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="control-group">
                        <label class="control-label">Biography</label>
                        {{--<div class="controls">--}}
                        <div class="controls">
                            <textarea class="textarea_editor span11" rows="6" placeholder="Enter Description ..." name="biography"></textarea>
                        </div>
                        {{--</div>--}}
                    </div>
                    <div class="form-actions " style="margin-left: 200px">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


@endsection