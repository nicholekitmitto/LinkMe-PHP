<div class="row">
  <div class="large-7 large-centered columns">
    {{ Form::model($user, array('url' => array("users/" . Auth::user()->id . "/update"))) }}
        <h2 class="form-signup-heading">Update your information</h2>

        {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
        {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
        {{ Form::text('location', null, array('class'=>'input-block-level', 'placeholder'=>'Location')) }}
        {{ Form::text('occupation', null, array('class'=>'input-block-level', 'placeholder'=>'Occupation')) }}
        {{ Form::textarea('bio', null, array('class'=>'input-block-level', 'placeholder'=>'About you', 'maxlength'=>'1500')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'New Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm New Password')) }}

        {{ Form::submit('Update', array('class'=>'overall button'))}}
    {{ Form::close() }}
  </div>
</div>
