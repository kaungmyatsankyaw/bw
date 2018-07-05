@extends('layouts.head')

@section('title','Post Create')

@section('section')

    <style>
        .control-group {
            margin: 5px;
        }
    </style>

    <script>
        $(document).ready(function () {



            $('#audio').on('change', function () {
                // alert($('#audio').val());
                let filename = $('#audio').val().split('\\').pop();
                let extension = filename.split('.').pop();
                let type = ['mp3', '3gp', 'act'];

                if (type.includes(extension)) {
                    toastr.success("Your choice is correct");
                    $('.btn-success').removeClass('disabled');
                } else {
                    toastr.warning("Only choose audio type file");
                    $('.btn-success').addClass('disabled');
                }
            });
            $('#image').on('change', function () {
                let filename = $('#image').val().split('\\').pop();
                let extension = filename.split('.').pop();
                let type = ['jpg', 'jpeg', 'png'];

                if (type.includes(extension)) {
                    toastr.success("Your choice is correct");
                    $('.btn-success').removeClass('disabled');

                } else {
                    toastr.warning("Only choose image type file");
                    $('.btn-success').addClass('disabled');
                }
            });
        });
    </script>


    <div class="container-fluid">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Post Create</h5>
            </div>
            <div class="widget-content nopadding">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">Title :</label>
                        <div class="controls">
                            <input type="text" class="span6" placeholder="Enter Title" value="{{$post->title}}" name="title" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category :</label>
                        <div class="controls">
                            <select id="category" class="span6" name="category">

                                @foreach($categories as $category)
                                  @if($post->category_id==$category->id)
                                  <option value="{{ $category->id }}" selected>
                                        {{ $category->title }}
                                    </option>
                                    @else
                                    <option value="{{ $category->id }}">
                                          {{ $category->title }}
                                      </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    @php
                    use App\Artist;
                    $artists=Artist::all();
                    @endphp
                    <div class="control-group">
                        <label class="control-label">Artist :</label>
                        <div class="controls">
                            <select id="" class="span6" name="artist">
                                @foreach($artists as $artist)
                                @if($post->artist_id==$artist->id)
                                    <option value="{{ $artist->id }}" selected>
                                        {{ $artist->artist_name }}
                                    </option>
                                    @else
                                    <option value="{{ $artist->id }}">
                                        {{ $artist->artist_name }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                  @if($post->image)
                  <div class="control-group">
                    <label class="control-label">Previous Image :</label>
                    <div class="controls">
                        <img src={{ asset('post/image/'.$post->image) }}>
                    </div>
                  </div>
                  @endif

                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <input type="file" size="19" name="image" id="image">
                        </div>
                    </div>

                  @if($post->audio)
                  <div class="control-group">
                      <label class="control-label">Previous Audio</label>
                      <div class="controls">
                        <audio src="{{ asset('/post/audio/'.$post->audio) }}" controls
                               style=""></audio>
                      </div>
                  </div>
                  @endif

                    <div class="control-group">
                        <label class="control-label">Audio</label>
                        <div class="controls">
                            <input type="file" size="19" name="audio" id="audio">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Description</label>

                        <div class="controls">
                            <textarea class="textarea_editor span6" rows="6" placeholder="Enter Description ..."
                                      name="description" required >{{$post->description}}</textarea>
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
