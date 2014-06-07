<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout)) {
			$users = User::getAllUsers();

			$this->layout = View::make($this->layout, array('users' => $users));
		}
	}

}
