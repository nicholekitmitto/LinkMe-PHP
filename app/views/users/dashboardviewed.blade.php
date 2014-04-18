<h1>Old Links</h1>
<p>These are your links that have been marked as viewed.</p>
<div class="dashboard-options">
  <ul>
    <li><a href="show">Your Profile</a></li>
    <li><a href="/users/{{Auth::user()->id}}/dashboard">Dashboard</a></li>
    <li><a href="/users/index">All Users</a></li>
  </ul>
</div>
<div class="your-questions">

@foreach ($oldLinks as $link)
  <p class="individual-link">
    <span class="sent-on">{{date("F j, Y, g:i a", strtotime($link->created_at))}}</span>
    <span class="message">{{$link->message}}</span>
    <span class="link"><a href="{{$link->link}}">{{$link->link}}</a></span>
    <span class="sent-from">From: {{User::getFullNameFromId($link->sender_id);}}</span>
    </p>
@endforeach
</div>
