<?php

class UsersModel extends Database{
	public function __construct(){
        global $db;
        parent::__construct($db);
	}

	public function getUsers(){
		return $this->select('users')->results();
	}
}
?>