<div class="row">
  <div class="small-8 large-centered columns">
    <h3>Send someone a link</h3>
    <ul class="users-list">
      @foreach ($users as $user)
        <li>
          <a href="{{$user->id}}/show" class="usernames">
          {{$user->firstname}} {{$user->lastname}}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
