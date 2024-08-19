<?php

require_once 'Database.php';

class UserDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($nom, $prenom, $telephone, $email, $login, $password, $role) {
		$sql= 'insert into users set nom= ?, prenom=?, telephone= ?, email=?, login= ?, password= ?, role= ?';
		$attributes= array($nom, $prenom, $telephone, $email, $login, $password, $role);
		$this->db->prepareReq($sql, $attributes);
	}

	public function readAll() {
		$sql= 'select * from users order by id desc';
		$req= $this->db->prepareReq($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id) {
		$sql= 'select * from users where id= ?';
		$attributes= array($id);
		$req= $this->db->prepareReq($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readCompte($login, $password) {
		$sql= 'select * from users where login= ? and password= ?';
		$attributes= array($login, $password);
		$req= $this->db->prepareReq($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function update($id, $nom, $prenom, $telephone, $email, $login, $password, $role) {
		$sql= 'update users set nom= ?, prenom=?, telephone= ?, email=?, login= ?, password= ?, role= ? where id= ?';
		$attributes= array($nom, $prenom, $telephone, $email, $login, $password, $role, $id);
		$this->db->prepareReq($sql, $attributes);
	}


	public function delete($id) {
		$sql= 'delete from users where id= ? ';
		$attributes= array($id);
		$this->db->prepareReq($sql, $attributes);
	}
}

?>