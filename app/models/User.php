<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public static $rules = array(
			'firstname'=>'required|alpha|min:2',
			'lastname'=>'required|alpha|min:2',
			'email'=>'required|email|unique:users',
			'bio'=>'min:2|max:1500',
			'location'=>'alpha|min:2',
			'occupation'=>'alpha|min:2',
			'password'=>'required|alpha_num|between:6,50|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
			);
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function Links() {
		return $this->hasMany('links');
	}

	public static function getFirstNameFromId($id) {
		return DB::table('users')->where('id', $id)->pluck('firstname');
	}

	public static function getLastNameFromId($id) {
		return DB::table('users')->where('id', $id)->pluck('lastname');
	}

	public static function getFullNameFromId($id) {
		return User::getFirstNameFromId($id) . " " . User::getLastNameFromId($id);
	}

	public static function getAllUsers() {
		return DB::table('users')
							 ->orderBy('firstname', 'asc')
							 ->get();
	}

}
