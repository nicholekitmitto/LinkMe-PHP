<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LinkMe</title>
    {{ HTML::style('packages/foundation/css/foundation.min.css') }}
    {{ HTML::style('css/main.css')}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lato:300')}}
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
          {{ Form::open(array('url'=>'users/signin', 'class'=>'')) }}
          <li>
            {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
          </li>
          <li>
            {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
          </li>
          <li>
            {{ Form::submit('Login', array('class'=>'overall button right-button'))}}
        {{ Form::close() }}
          </li>
<!--           <li>{{ HTML::link('users/register', 'Register') }}</li> -->
          @else
          <li class="send">{{ HTML::link('/users/index', 'Send a Link')}}</li>
          <li>{{ HTML::link("/users/" . Auth::user()->id . "/dashboard", 'Home')}}</li>
          @endif
          <li class="has-dropdown not-click">
            @if (Auth::check())
            <a href="/users/{{Auth::user()->id}}/dashboard">Hello, {{Auth::user()->firstname}}!</a>
            @else

            @endif
            </h1>
            <ul class="dropdown">
              <li class="title back js-generated">
                <h5><a href="javascript:void(0)">Back</a></h5>
              </li>
              @if (Auth::check())
              <li>
                <a href="/users/{{Auth::user()->id}}/show">My Profile</a>
              </li>
              <li>
                <a href="/users/{{Auth::user()->id}}/updateprofile">Edit Profile</a>
                <li>
                <li>{{ HTML::link("users/" . Auth::user()->id . "/dashboardviewed", 'Viewed links')}}</li>
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
            {{ Form::open(array('url'=>'users/signin', 'class'=>'')) }}
            <li>
              {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
            </li>
            <li>
              {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
            </li>
            <li>
              {{ Form::submit('Login', array('class'=>'overall button right-button'))}}
          {{ Form::close() }}
            </li>
            @else
            <li class="send">{{ HTML::link('/users/index', 'Send a Link')}}</li>
            <li>{{ HTML::link("/users/" . Auth::user()->id . "/dashboard", 'Home')}}</li>
            @endif
            <li class="has-dropdown not-click">
              @if (Auth::check())
              <a href="#">Hello, {{Auth::user()->firstname}}!</a>
              @else
              
              @endif
              <ul class="dropdown">
                <li class="title back js-generated">
                  <h5><a href="javascript:void(0)">Back</a></h5>
                </li>
                @if (Auth::check())
                <li>{{ HTML::link("users/" . Auth::user()->id . "/dashboardviewed", 'Viewed links')}}</li>
                <li>
                  <a href="/users/{{Auth::user()->id}}/show">My Profile</a>
                </li>
                <li>
                  <a href="/users/{{Auth::user()->id}}/updateprofile">Edit Profile</a>
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
<div class="container">
  <div class="row rowbody">
    <div class="large-12 large-centered columns">
      @if(Session::has('message'))
      <p class="alert-box">{{ Session::get('message') }}</p>
      @endif
    </div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
      {{ $content }}
  </div>
  <div class="footer-image">
    <img src="/img/top.png">
  </div>
</div>

{{ HTML::script('packages/foundation/js/foundation/jquery-1.10.2.min.js')}}
{{ HTML::script('packages/foundation/js/foundation/foundation.js')}}
{{ HTML::script('packages/foundation/js/foundation/foundation.topbar.js')}}
{{ HTML::script('packages/foundation/js/foundation/foundation.equalizer.js')}}
{{ HTML::script('packages/foundation/js/foundation/isotope.pkgd.min.js')}}
{{ HTML::script('js/main.js')}}
  </body>
</html>
