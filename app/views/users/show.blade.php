<div class="row">
  <div class="small-12 large-centered columns">
    <h1>
    {{$user->firstname}} {{$user->lastname}}
    </h1>
    @if ($user->id != Auth::user()->id)
      <div class="small-9 small-centered large-uncentered columns">
        <a href="/users/{{$user->id}}/sendlink" class="overall button">Send {{$user->firstname}} a link</a>
    @else
      <div class="small-9 small-centered large-uncentered columns">
        <a href="/users/{{Auth::user()->id}}/updateprofile" class="overall button">Update your profile</a>
    @endif
          <div class="profile-section">
            <span class="bold">
              Lives in:
            </span>
                {{$user->location}}
          </div>

          <div class="profile-section">
          <span class="bold">
            Occupation:
          </span>
            {{$user->occupation}}
          </div>

          <div class="profile-section">
          <span class="bold">
            About {{$user->firstname}}:
          </span>
            <p> {{$user->bio}}</p>
          </div>
      </div>
  </div>
</div>
