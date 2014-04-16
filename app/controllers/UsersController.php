<?php
class UsersController extends BaseController {
  public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
  }

  protected $layout = "layouts.main";

  public function getRegister() {
    $this->layout->content = View::make('users.register');
  }

  public function postCreate() {
    $validator = Validator::make(Input::all(), User::$rules);

    if ($validator->passes()) {
      $user = new User;
      $user->firstname = Input::get('firstname');
      $user->lastname = Input::get('lastname');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      return Redirect::to('users/login')->with('message', 'Thanks for registering!');
    } else {
      return Redirect::to('users/register')
        ->with('message', 'Sorry! The following errors occured')
        ->withErrors($validator)
        ->withInput();
    }
  }

  public function getLogin() {
    $this->layout->content = View::make('users.login');
  }

  public function postSignin() {
    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
      $userid = Auth::user()->id;
      return Redirect::to("users/$userid/dashboard")->with('message', 'You are now logged in!');
    } else {
      return Redirect::to('users/login')
        ->with('message', 'Sorry! Your username/password combination was incorrect')
        ->withInput();
    }
  }

  public function getDashboard() {
    $this->layout->content = View::make('users.dashboard');
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::to('users/login')->with('message', 'You logged out successfully!');
  }

  public function getShow($id) {
    $user = User::findOrFail($id);

    $this->layout->content = View::make('users.show', array('user' => $user));
  }

  /*public function postShow() {
    $validator = Validator::make(Input::all(), User::$rules);

    if ($validator->passes()) {
      $links = new Link;
      $links->message = Input::get('message');
      $links->link = Input::get('link');
      $links->save();

      return Redirect::to('users/show')->with('message', 'Your link has been sent successfully!');
    } else {
      return Redirect::to('users/register')
        ->with('message', 'Sorry! The following errors occured')
        ->withErrors($validator)
        ->withInput();
    }
  }*/

}
?>
