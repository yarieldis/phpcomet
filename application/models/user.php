<?php

class User extends BaseModel {

	var $has_one = array ('group');
	
	var $validation = array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => array('required', 'min_length' => 3, 'max_length' => 40, 'encrypt'),
		),
		array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => array('encrypt', 'matches' => 'password'),
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => array('required', 'trim', 'unique'),
		),
		array(
			'field' => 'email',
			'label' => 'E-Mail',
			'rules' => array('required', 'email', 'trim', 'unique'),
		),
	);
	
	function __construct(){
		parent::__construct();
	}
	
	function _encrypt($field) {
		if (!empty($this->{$field})) {
			if (empty($this->salt)) {
				$this->salt = md5(uniqid(rand(), true));
			}
			$this->{$field} = sha1($this->salt . $this->{$field});
		}
	}
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */