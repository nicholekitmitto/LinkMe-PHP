<div class="row">
@if (empty($links))
<div class="large-9 columns">
  <h1>Dashboard</h1>
  <p>Welcome to your Dashboard. You're awesome!</p>
  <h1>Looks like you don't have any links!</h1>
</div>
@else
<div class="row">
<div class="large-7 columns">
  <h1>Dashboard</h1>
  <p>Welcome to your Dashboard. You're awesome!</p>
</div>
<div class="large-5 columns dash-buttons">
    {{ Form::open(array('url'=>"users/" . Auth::user()->id . "/links/viewed", 'class'=>'mark-all-button')) }}
    {{ Form::submit('Mark All Viewed', array('class'=>'overall button'))}}
  {{ Form::close() }}
  <a href="#" class="overall button openAll">Open all in new tabs</a>
</div>
@endif
</div>
<div class="row">
<div class="small-12 large-centered columns">
    <div class="row">
      <ul class="link-rows">
      @foreach ($links as $link)
          <li class="individual-card">
            <span class="sent-on">{{date("F j, Y, g:i a", strtotime($link->created_at))}}</span>
            <span class="message">{{$link->message}}</span>
            <span class="link"><a href="/users/{{Auth::user()->id}}/links/{{$link->id}}/view" target="_blank">{{$link->link}}</a></span>
            <span class="sent-from">From: {{User::getFullNameFromId($link->sender_id);}}</span>
<!--               {{ Form::open(array('url'=>"users/$link->recipient_id/links/$link->id/viewed", 'class'=>'mark-button')) }}
            {{ Form::submit('Mark As Viewed', array('class'=>'button'))}}
        {{ Form::close() }} -->
          </li>
      @endforeach
      </ul>
    </div>
  </div>
</div>
