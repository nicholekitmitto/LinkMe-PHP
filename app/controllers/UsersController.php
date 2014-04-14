<?php
class UsersController extends BaseController {
  public function __construct() {
    $this->beforeFilter('csrf', array('on' => 'post'));
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
      return Redirect::to('users/register')->with('message', 'Sorry! The following errors occured')->withErrors($validator)->withInput();
    }
  }

  public function getLogin() {
    $this->layout->content = View::make('users.login');
  }

}
?>
