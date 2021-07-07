<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * User controller
	 * 
	 * Used to handle
	 * - user registration
	 * - user login
	 * - user logout
	 */
	class User extends CI_Controller {

		function __construct() {
			parent::__construct();

			// Libraries
			$this->load->library('form_validation');
			$this->load->library($this->config->item('Lib_user_lib'));

			// Models

			$this->is_logged_in		=	!empty($this->session->userdata("ci_session")) ? TRUE : FALSE;
		}

		/**
		 * Default function
		 */
		function index() {

		}


		function register() {

			$data["data"]["is_logged_in"]	=	$this->is_logged_in;

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_registration");

			$this->load->view($this->config->item("View_master"),$data);
		}


		function save() {

			$data["data"]["is_logged_in"]	=	$this->is_logged_in;

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$registration_validation	=	$this->registration_validations();

			if($registration_validation === false) {
				$this->register();
			} else {
				$user_data["email"]		=	$this->input->post("email", TRUE);
				$user_data["password"]	=	$this->input->post("password", TRUE);

				$allow_registration			=	$this->allow_registration($user_data["email"]);

				if(!empty($allow_registration)) {
					$user_registration_status	=	$this->user_lib->save_user($user_data);
					
					if(empty($user_registration_status)) {
						$flash_message	=	"<div class='alert alert-danger'>Uh-oh something went wrong! Please try again later!!</div>";
					} else {
						$flash_message	=	"<div class='alert alert-success'>User Registration Successful! Please Login to Continue!!</div>";
						$this->session->set_flashdata("message",$flash_message);
						redirect($this->config->item("base_url").$this->config->item("Cont_login"));
					}
				} else {
					$flash_message	=	"<div class='alert alert-danger'>User exists with the given Email Id! Please try again later!!</div>";
				}
				$this->session->set_flashdata("message",$flash_message);
				redirect($this->config->item("base_url").$this->config->item("Cont_registration"));
			}

		}

		function login() {

			if(!empty($this->is_logged_in)) {
				redirect($this->config->item("Cont_catalog"));
			}

			$data["data"]["is_logged_in"]	=	$this->is_logged_in;

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_login");

			$this->load->view($this->config->item("View_master"),$data);
		}

		/**
		 * Authenticates the logging in user
		 * and takes necessary actions in this function
		 */
		function auth() {
			$login_validation	=	$this->login_validations();

			if(empty($login_validation)) {
				$this->login();
			} else {
				$user_data["email"]		=	$this->input->post("email",true);
				$user_data["password"]	=	$this->input->post("password",true);

				$user_validated	=	$this->user_lib->validate_user($user_data);

				if(!empty($user_validated)) {
					$session_data	=	array(
											'user_id'	=>	$user_validated['user_id'],
											'email'		=>	$user_data["email"]
										);

					$this->session->set_userdata('ci_session',$session_data);

					redirect($this->config->item("base_url").$this->config->item("Cont_catalog"));
				} else {
					$flash_message	=	"<div class='alert alert-success'>Uh-Oh something went wrong! Please try again later!!</div>";

					$this->session->set_flashdata("message",$flash_message);
					redirect($this->config->item("base_url").$this->config->item("Cont_login"));
				}
			}
		}

		/**
		 * Function to validate 
		 */
		function registration_validations() {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|matches[password]');

			if($this->form_validation->run() == FALSE) {
				return false;
			} else {
				return true;
			}
		}

		function login_validations() {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			if($this->form_validation->run() == FALSE) {
				return false;
			} else {
				return true;
			}
		}

		function allow_registration($email='') {
			if(empty($email)) {
				return false;
			}

			$is_existing_user		=	$this->user_lib->is_existing_user($email);

			if(!empty($is_existing_user)) {
				return false;
			}

			return true;
		}

		function logout() {
			if(empty($this->is_logged_in)) {
			} else {
				$this->session->unset_userdata('ci_session');
			}

			redirect($this->config->item("base_url").$this->config->item("Cont_login"));
		}

	}

?>