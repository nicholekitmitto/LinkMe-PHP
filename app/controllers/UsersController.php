<?php
class UsersController extends BaseController {
  public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    $this->beforeFilter('isOwnUser', array('only'=>array('getDashboard', 'getDashboardViewed')));
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

  public function getUpdate($id) {
    $user = User::findOrFail($id);

    $this->layout->content = View::make('users.updateprofile',  array('user' => $user));
  }

  public function postUpdate($id) {

      $user = User::findOrFail($id);
      $user->firstname = Input::get('firstname');
      $user->lastname = Input::get('lastname');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->bio = Input::get('bio');
      $user->location = Input::get('location');
      $user->occupation = Input::get('occupation');
      $user->save();
    if ($user) {

      return Redirect::to('users/' . Auth::user()->id . '/show')->with('message', 'Your profile has been updated!');
    } else {
      return Redirect::back()
        ->with('message', 'Sorry! The following errors occured')
        ->withInput();
    }
  }

  public function getLogin() {
    $this->layout->content = View::make('users.login');
  }

  public function postSignin() {
    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')), true)) {
      $userid = Auth::user()->id;
      return Redirect::to("users/$userid/dashboard")->with('message', 'You are now logged in!');
    } else {
      return Redirect::to('users/login')
        ->with('message', 'Sorry! Your username/password combination was incorrect')
        ->withInput();
    }
  }

  public function getDashboard($id) {
    $links = Links::getLinksByUserId($id);

    $this->layout->content = View::make('users.dashboard', array('links' => $links));
  }

  public function getDashboardViewed($id) {
    $oldLinks = Links::getViewedLinksByUserId($id);

    $this->layout->content = View::make('users.dashboardviewed', array('oldLinks' => $oldLinks));
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::to('users/login')->with('message', 'You logged out successfully!');
  }

  public function getShow($id) {
    $user = User::findOrFail($id);

    $this->layout->content = View::make('users.show', array('user' => $user));
  }

  public function getSendLink($id) {
    $user = User::findOrFail($id);

    $this->layout->content = View::make('users.sendlink', array('user' => $user));
  }

  public function getIndex() {
    $users = User::getAllUsers();

    $this->layout->content = View::make('users.index', array('users' => $users));
  }



}
?>
