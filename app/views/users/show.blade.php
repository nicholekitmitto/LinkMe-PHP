<div class="row">
  <div class="small-12 large-centered columns">
    <h1>
    {{$user->firstname}} {{$user->lastname}}
    </h1>
    <div class="small-9 small-centered large-uncentered columns">
      <a href="/users/{{$user->id}}/sendlink" class="overall button">Send {{$user->firstname}} a link</a>
      <p>
      <h4>
        Lives in:
      </h4>
          {{$user->location}}
      </p>
      <p>
        Occupation: {{$user->occupation}}
      </p>
      <p>
        About {{$user->firstname}}: {{$user->bio}}
      </p>
    </div>

    @if ($user->id != Auth::user()->id)
      {{ Form::open(array('url'=>"users/$user->id/links/create", 'class'=>'form-signup')) }}
      {{ Form::text('link', null, array('class'=>'input-block-level', 'placeholder'=>'Enter the link here')) }}
      {{ Form::label('message', 'Optional Message. 250 character maximum.')}}
      {{ Form::textarea('message', null, array('class'=>'input-block-level', 'placeholder'=>'Enter a message.', 'maxlength'=>'250')) }}
      {{ Form::hidden('recipient_id', $user->id)}}
      {{ Form::submit('Submit', array('class'=>'small round button'))}}
      {{ Form::close() }}
    @else
      <div class="small-9 small-centered large-uncentered columns">
        <a href="/users/{{Auth::user()->id}}/updateprofile" class="overall button">Update your profile</a>
        <p>
        <h4>
          Lives in:
        </h4>
            {{$user->location}}
        </p>
        <p>
          Occupation: {{$user->occupation}}
        </p>
        <p>
          About {{$user->firstname}}: {{$user->bio}}
        </p>
      </div>
    @endif
  </div>
</div>
