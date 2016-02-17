@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:70px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
      <div class="panel panel-default">
      
        <div class="panel-body">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <p>Username/Password Incorrect</p>
                      @endforeach
                  </ul>
              </div>
          @endif

          {!! Form::open(array('url'=>'/dw-admin/login')) !!}
          {!! csrf_field() !!}
            <fieldset>
              <div class="row">
                <div class="center-block"> <img class="profile-img" src="{{ asset('img/logo.png') }}" class="img-responsive" alt=""> </div>
                <hr>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                  {!! Form::label('email', 'Email') !!}
                    <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
                      {!! Form::text('email', old('username'), ['class'=>'form-control', 'placeholder'=>'Email', 'autofocus']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                   {!! Form::label('password', 'Password') !!}
                    <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> </span>
                      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Placeholder']) !!}
                    </div>
                  </div>
                 
                  <div class="form-group">
                   <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                    {!! Form::submit('Log In',['class'=>'btn btn-success']) !!}
                    <a class="btn btn-default" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                  </div>
                 
                </div>
              </div>
             
            </fieldset>
          {!! Form::close() !!}
      
        </div>
      </div>
  </div>
  </div>
@endsection
