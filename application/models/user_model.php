<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->table_users			=	$this->config->item('Table_users');
	}

	function save_user($user_data=array()) {
		$user_data["created_date"]	=	time();
		$user_data["password"]		=	md5($user_data["password"]);

		$this->db->insert($this->table_users,$user_data);

		if($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function is_existing_user($email='') {

		$this->db->select('user_id');
		$this->db->where('email',$email);
		$this->db->from($this->table_users);

		$result_data	=	$this->db->get();

		if($result_data->num_rows() > 0) {
			return $result_data->row_array();
		} else {
			return array();
		}
	}

	function validate_user($email='',$password='') {

		$this->db->select('user_id');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$this->db->from($this->table_users);

		$result_data	=	$this->db->get();

		if($result_data->num_rows() > 0) {
			return $result_data->row_array();
		} else {
			return array();
		}
	}
}