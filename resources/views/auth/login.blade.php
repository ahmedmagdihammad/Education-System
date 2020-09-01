@extends('layouts.app')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Octopusta</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form method="POST" action="{{ route('login') }}">
                            @csrf
    <div class="form-group has-feedback">
        <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' has-error' : '' }}" name="mobile" value="{{ old('mobile') }}" placeholder="mobile" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('mobile'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('mobile') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
        <div class="offset-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ __('Login') }}
            </button>
        </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
