<div class="row">
  <div class="small-8 large-centered columns">
    <a href="/users/{{$user->id}}/show" class="overall button">Back to {{$user->firstname}}'s Profile</a>
    <h1>Send {{$user->firstname}} {{$user->lastname}} a link</h1>
    {{ Form::open(array('url'=>"users/$user->id/links/create", 'class'=>'form-signup')) }}
    {{ Form::text('link', null, array('class'=>'input-block-level', 'placeholder'=>'Enter the link here')) }}
    {{ Form::label('message', 'Optional Message. 250 character maximum.')}}
    {{ Form::textarea('message', null, array('class'=>'input-block-level', 'placeholder'=>'Enter a message.', 'maxlength'=>'250')) }}
    {{ Form::hidden('recipient_id', $user->id)}}
    {{ Form::submit('Submit', array('class'=>'overall button'))}}
    {{ Form::close() }}
  </div>
</div>
