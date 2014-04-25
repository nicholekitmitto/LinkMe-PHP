<div class="row">
  <div class="small-12 large-centered columns">
    <h1>
    {{$user->firstname}} {{$user->lastname}}
    </h1>

    @if ($user->id != Auth::user()->id)
      {{ Form::open(array('url'=>"users/$user->id/links/create", 'class'=>'form-signup')) }}
      {{ Form::textarea('message', null, array('class'=>'input-block-level', 'placeholder'=>'Enter a message')) }}
      {{ Form::text('link', null, array('class'=>'input-block-level', 'placeholder'=>'Enter the link here')) }}
      {{ Form::hidden('recipient_id', $user->id)}}
      {{ Form::submit('Submit', array('class'=>'small round button'))}}
      {{ Form::close() }}
    @else {{"HEY"}}
    @endif
  </div>
</div>
