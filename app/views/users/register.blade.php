<div class="row">
  <div class="large-9 large-centered columns">
    {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Please Register</h2>
        {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
        {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}

        {{ Form::submit('Register', array('class'=>'overall button'))}}
    {{ Form::close() }}
  </div>
</div>
