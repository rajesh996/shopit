<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_lib {

	function __construct($params= array())	{
		$this->CI 	=& get_instance();

		$this->CI->load->model($this->CI->config->item('Mod_user_model'));
		if(count($params) > 0){	$this->initialize($params);}
	}

	function initialize($params){
		if (count($params) > 0)	{
			foreach ($params as $key => $val){$this->$key = $val;}
		}
	}


	/**
	 * Function to save new user details
	 * 
	 * @param array $user_data
	 * 
	 * @return boolean
	 */
	function save_user($user_data=array()) {
		return $this->CI->user_model->save_user($user_data);
	}

	/**
	 * Function used to check if the logging user
	 * is an existing user or not
	 * 
	 * @param array $user_data
	 * 
	 * @return boolean
	 */
	function is_existing_user($email='') {

		$user_exists	=	$this->CI->user_model->is_existing_user($email);

		if(!empty($user_exists)) {
			return $user_exists;
		} else {
			return false;
		}
	}


	function validate_user($user_data=array()) {
		$email		=	$user_data["email"];
		$password	=	$user_data["password"];

		$user_validated	=	$this->CI->user_model->validate_user($email, $password);

		if(!empty($user_validated)) {
			return true;
		} else {
			return false;
		}
	}
}