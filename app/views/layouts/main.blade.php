<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LinkMe</title>
    {{ HTML::style('packages/foundation/css/foundation.min.css') }}
    {{ HTML::style('css/main.css')}}
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
            @endif
          </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a>
          </li>
        </ul>
        <section class="top-bar-section">

          <!-- Right Nav Section -->
        <ul class="right show-for-large-up">
          @if(!Auth::check())
          <li class="active">{{ HTML::link('users/login', 'Login') }}</li>
          <li>{{ HTML::link('users/register', 'Register') }}</li>
          @else
          <li class="active">{{ HTML::link('users/logout', 'Logout') }}</li>
          @endif
          <li class="has-dropdown not-click">
            @if (Auth::check())
            <a href="#">Hello, {{Auth::user()->firstname}}!</a>
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
                  @else
                  <li>
                  </li>
                  @endif
            </ul>
            </li>
        </ul>

          <ul class="right hide-for-large-up">
            <li class="active"><a href="#">Right Button</a>
            </li>
            <li class="has-dropdown not-click">
              <a href="#">Right Dropdown</a>
              <ul class="dropdown">
                <li class="title back js-generated">
                  <h5><a href="javascript:void(0)">Back</a></h5>
                </li>
                <li><a href="#">First link in dropdown</a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
      </nav>
    </div>


    <div class="row">
      <div class="small-8 large-centered columns">
        @if(Session::has('message'))
        <p class="alert-box">{{ Session::get('message') }}</p>
        @endif

        {{ $content }}
      </div>
    </div>
  </body>
</html>
