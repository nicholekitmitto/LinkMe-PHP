<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LinkMe</title>
    {{ HTML::style('packages/foundation/css/foundation.min.css') }}
    {{ HTML::style('css/main.css')}}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lato:300')}}
    {{ HTML::script('packages/foundation/js/foundation/foundation.js')}}
    {{ HTML::script('packages/foundation/js/foundation/foundation.topbar.js')}}

    <script src="js/jquery-1.10.2.min.js"></script>
  </head>

  <body>
    <div>
      <nav class="top-bar" data-topbar="">
        <ul class="title-area">
          <li class="name">
            @if (Auth::check())
            <h1><a href="/users/{{Auth::user()->id}}/dashboard">LinkMe</a></h1>
            @else
            <h1><a href="/login">LinkMe</a></h1>
          </li>
          @endif
          <li class="toggle-topbar menu-icon">
            <a href="#">Menu</a>
          </li>
        </ul>
        <section class="top-bar-section">

          <!-- Right Nav Section -->
        <ul class="right show-for-large-up">
          @if(!Auth::check())
          <li class="active">{{ HTML::link('users/login', 'Login') }}</li>
          <li>{{ HTML::link('users/register', 'Register') }}</li>
          @else
          <li>{{ HTML::link("users/" . Auth::user()->id . "/dashboardviewed", 'Viewed links')}}</li>
          <li>{{ HTML::link('/users/index', 'All Users')}}</li>
          @endif
          <li class="has-dropdown not-click">
            @if (Auth::check())
            <a href="/users/{{Auth::user()->id}}/dashboard">Hello, {{Auth::user()->firstname}}!</a>
            @else
            <a href="#">Hello!</a>
            @endif
            </h1>
            <ul class="dropdown">
              <li class="title back js-generated">
                <h5><a href="javascript:void(0)">Back</a></h5>
              </li>
              @if (Auth::check())
              <li>
                <a href="#">My Profile</a>
              </li>
              <li>
                <a href="#">Edit Profile</a>
                <li>
                  <li>
                    <a href="/users/{{Auth::user()->id}}/dashboard">Dashboard</a>
                  </li>
                  <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                  @else
                  <li>
                  </li>
                  @endif
            </ul>
            </li>
        </ul>

          <ul class="right hide-for-large-up">
            @if(!Auth::check())
            <li class="active">{{ HTML::link('users/login', 'Login') }}</li>
            <li>{{ HTML::link('users/register', 'Register') }}</li>
            @else
            <li>{{ HTML::link("users/" . Auth::user()->id . "/dashboardviewed", 'Viewed links')}}</li>
            <li>{{ HTML::link('/users/index', 'All Users')}}</li>
            @endif
            <li class="has-dropdown not-click">
              @if (Auth::check())
              <a href="#">Hello, {{Auth::user()->firstname}}!</a>
              @else
              <a href="#">Hello!</a>
              @endif
              <ul class="dropdown">
                <li class="title back js-generated">
                  <h5><a href="javascript:void(0)">Back</a></h5>
                </li>
                @if (Auth::check())
                <li>
                  <a href="/users/{{Auth::user()->id}}/dashboard">Dashboard</a>
                </li>
                <li>
                  <a href="#">My Profile</a>
                </li>
                <li>
                  <a href="#">Edit Profile</a>
                </li>
                <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                @else
                <li>
                </li>
                @endif
              </ul>
            </li>
          </ul>
        </section>
      </nav>
    </div>

  <div class="row">
    <div class="small-12 large-centered columns">
      @if(Session::has('message'))
      <p class="alert-box">{{ Session::get('message') }}</p>
      @endif
    </div>
      {{ $content }}
  </div>
  </body>
</html>
