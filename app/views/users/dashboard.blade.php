<h1>Dashboard</h1>
<p>Welcome to your Dashboard. You're awesome!</p>
<div class="dashboard-options">
  <ul>
    <a href="show">Your Profile</a>
    <a href="#">Your links</a>
    <a href="/users/index">Users</a>
  </ul>
</div>
<div class="your-questions">

  @foreach ($links as $link)
    <p>
      <span class="message">{{$link->message}}</span>
      <span class="link">{{$link->link}}</span>
      <span class="sent-from">Sent from: {{User::getFullNameFromId($link->sender_id);}}</span>
      </p>
  @endforeach

  <a href="#" class="small round button">Open all in new tabs</a>
</div>
