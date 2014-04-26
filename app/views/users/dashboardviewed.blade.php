<h1>Old Links</h1>
<p>These are your links that have been marked as viewed.</p>

<div class="row">
  <ul class="link-rows">
    @foreach ($oldLinks as $link)
      <li class="individual-link">
        <span class="sent-on">{{date("F j, Y, g:i a", strtotime($link->created_at))}}</span>
        <span class="message">{{$link->message}}</span>
        <span class="link"><a href="{{$link->link}}">{{$link->link}}</a></span>
        <span class="sent-from">From: {{User::getFullNameFromId($link->sender_id);}}</span>
      </li>
    @endforeach
  </ul>
</div>
