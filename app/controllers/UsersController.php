<?php
class UsersController extends BaseController {
  protected $layout = "layouts.main";

  public function getRegister() {
    $this->layout->content = View::make('users.register');
  }
}
?>
