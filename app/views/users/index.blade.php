@foreach ($users as $user)
  <a href="{{$user->id}}/show" class="usernames">
    {{$user->firstname}} {{$user->lastname}}
  </a>
@endforeach
