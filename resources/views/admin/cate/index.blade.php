@extends('layouts.head')

@section('title','Category Create')

@section('section')



    <style>
        .control-group{
            margin: 5px;
        }
    </style>

    <div class="container-fluid">


        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Category Create</h5>
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
                <form  method="post" class="form-horizontal">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Title :</label>
                        <div class="controls">
                            <input type="text" class="span11" placeholder="Enter Title"  name="title"/>
                        </div>
                    </div>
                    <div class="form-actions " style="margin-left: 200px">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Data table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="gradeA ">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td class="justify-content-between">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal{{ $category->id }}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form  method="post" class="form-horizontal" action="{{ url('admin/cate/edit/'.$category->id) }}">
                                                        @csrf
                                                        <div class="control-group">
                                                            <label class="control-label">Title :</label>
                                                            <div class="controls">
                                                                <input type="text" class="span4" placeholder="Enter Title"  name="title" value="{{ $category->title }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions " style="">
                                                            <button type="submit" class="btn btn-success" style="margin-left: 180px">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <a href="{{ url('/admin/cate/delete/'.$category->id) }}" role="button"
                                    class="btn btn-danger">
                                        <span class="icon icon-trash">Delete</span>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection

