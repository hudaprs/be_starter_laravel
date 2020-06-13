{!!
  Form::model($user, [
    'route' => $user->exists 
      ? ['users.update', $user->id]
      : 'users.store',
    'method' => $user->exists ? 'PUT' : 'POST'
  ])
!!}

  <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null,  ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
  </div>

  @if(!$user->exists)
    <div class="form-group">
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('password_confirmation', 'Password Confirmation') }}
      {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
  @endif

{!! Form::close() !!}