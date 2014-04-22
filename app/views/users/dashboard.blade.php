<h1>Dashboard</h1>
<p>Welcome to your Dashboard. You're awesome!</p>
<div class="dashboard-options">
  <ul>
    <li><a href="show">Your Profile</a></li>
    <li><a href="/users/{{Auth::user()->id}}/dashboardviewed">Viewed links</a></li>
    <li><a href="/users/index">All Users</a></li>
  </ul>
</div>
<div class="your-questions">

  @foreach ($links as $link)
    <p class="individual-link">
      <span class="sent-on">{{date("F j, Y, g:i a", strtotime($link->created_at))}}</span>
      <span class="message">{{$link->message}}</span>
      <span class="link"><a href="{{$link->link}}">{{$link->link}}</a></span>
      <span class="sent-from">From: {{User::getFullNameFromId($link->sender_id);}}</span>
      {{ Form::open(array('url'=>"users/$link->recipient_id/links/$link->id/viewed", 'class'=>'form-signup')) }}
      {{ Form::submit('Mark As Viewed', array('class'=>'mark small round button'))}}
  {{ Form::close() }}

      </p>
  @endforeach

  {{ Form::open(array('url'=>"users/" . Auth::user()->id . "/links/viewed", 'class'=>'form-signup')) }}
  {{ Form::submit('Mark All As Viewed', array('class'=>'mark small round button'))}}
{{ Form::close() }}

  <a href="#" class="small round button">Open all in new tabs</a>
</div>
