<?php

class Group extends BaseModel {

	var $has_many = array("user");	
	
	function __construct()	{
		parent::__construct();
	}
	
	var $validation = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => array('required', 'trim', 'unique', 'min_length' => 3, 'max_length' => 20)
		),
	);
	
}

/* End of file group.php */
/* Location: ./application/models/group.php */