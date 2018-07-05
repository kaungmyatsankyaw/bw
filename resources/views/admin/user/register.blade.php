@extends('layouts.head')

@section('title','Register')

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
                <input type="text" class="span11" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">UserName :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Enter Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Confirm Password</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Confirm Password" name="password_confirmation" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value="{{ old('address') }}" required autofocus>
                @if ($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="control-group">
              <label class="control-label">Phone Number</label>
              <div class="controls">
                <input id="phone_number" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} span11" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                @if ($errors->has('phone_number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


<!-- <div class="container-fluid">
    <div class="widget-box">
<form method="POST" action="{{ route('register') }}" class="pl-">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

            @if ($errors->has('address'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

        <div class="col-md-6">
            <input id="phone_number" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

            @if ($errors->has('phone_number'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
</div> -->
<!-- </div> -->
