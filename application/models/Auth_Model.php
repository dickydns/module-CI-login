<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth_Model Extends CI_Model{
 	public function __construct(){
        parent::__construct(); 
   
     }
	Public function proccessLogin($username){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->limit('1');
		$table = $this->db->get();
		return $table;
	}
	
	Public function proccessRegister($data){
		return $this->db->insert('users', $data);
	}

	Public function usernameCheck($username){
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$table = $this->db->get();
		return $table;
	}
}