<div class="row">
  <div class="small-12 large-centered columns">
    <h1>
    {{$user->firstname}} {{$user->lastname}}
    </h1>
    @if ($user->id != Auth::user()->id)
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
