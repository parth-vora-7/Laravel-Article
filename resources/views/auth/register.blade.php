@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
          @include('errors/error')
          {!! Form::open(array('route' => 'register', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal')) !!}
          <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('sex', 'Sex', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::radio('sex', 'male', true, ['class' => 'col-md-2']) !!}
              {!! Form::label('sex', 'Male', ['class' => 'col-md-2 control-label']) !!}
              
              {!! Form::radio('sex', 'female', false, ['class' => 'col-md-2']) !!}
              {!! Form::label('sex', 'Female', ['class' => 'col-md-2 control-label']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('contact_no', 'Contact no', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::tel('contact_no', '', ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
              {!! Form::textarea('address', '', ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('profile_pic', 'Profile pic', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
               {!! Form::file('profile_pic', ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Register
              </button>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
