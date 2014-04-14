<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LinkMe</title>
    {{ HTML::style('packages/foundation/css/foundation.min.css') }}
    {{ HTML::style('css/main.css')}}
  </head>

  <body>
    <div>
      <nav class="top-bar" data-topbar="">
        <ul class="title-area">
          <li class="name">
            <h1><a href="dashboard">LinkMe</a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a>
          </li>
        </ul>
        <section class="top-bar-section">

          <!-- Right Nav Section -->
          <ul class="right show-for-large-up">
            @if(!Auth::check())
                    <li>{{ HTML::link('users/register', 'Register') }}</li>
                    <li class="active">{{ HTML::link('users/login', 'Login') }}</li>
                @else
                    <li class="active">{{ HTML::link('users/logout', 'Logout') }}</li>
                @endif
            <li class="has-dropdown not-click">
              <a href="#">Hello</a>
              </h1>
              <ul class="dropdown">
                <li class="title back js-generated">
                  <h5><a href="javascript:void(0)">Back</a></h5>
                </li>
                <li><a href="#">My Profile</a>
                </li>
                <li>
                  <a href="#">Edit Profile</a>
                  <li>
                    <li><a href="dashboard">Dashboard</a>
                    </li>
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
      <div class="small-6 large-centered columns">
        @if(Session::has('message'))
        <p class="alert-box">{{ Session::get('message') }}</p>
        @endif

        {{ $content }}
      </div>
    </div>
  </body>
</html>
