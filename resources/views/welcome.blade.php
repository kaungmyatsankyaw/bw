<style>
    .block {
        display: block;
        width: 100%;
        border: none;
        background-color:rgb(254,174,0);
        color: white;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }

</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        
            <img src="{{asset('post/bblogo.png')}}" alt="" style="position:absolute;left:250px;top:260px;width:150px;height:140px;z-index:3">
     
            <div class="col-md-10">
                <div class="card" style="margin-top:180px !important;">
                    <div class="card-header" >
                        <h3 class="text-center">Welcome To Dama Data Server</h3>
                    </div>

                    <div class="card-body" >
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0" >
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-block block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
