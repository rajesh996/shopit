<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Catalog controller (default controller)
	 * 
	 * Used to display the catalog
	 * and also used to display the individual
	 * catalog's data
	 */
	class Catalog extends CI_Controller {

		function __construct() {
			parent::__construct();

			// Libraries
			$this->load->library('form_validation');
			$this->load->library($this->config->item('Lib_catalog_lib'));

			// Models

			$this->is_logged_in		=	!empty($this->session->userdata("ci_session")) ? TRUE : FALSE;
		}

		/**
		 * Default function
		 */
		function index() {

			$data["data"]["catalog_data"]	=	array();

			$data["data"]["is_logged_in"]	=	$this->is_logged_in;

			// Pass required js & css file names
			$data["data"]["js"]		=	array("catalog");
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog");

			$this->load->view($this->config->item("View_master"),$data);
		}


		function add(){
			$this->check_login();

			$data["data"]["catalog_data"]	=	array();

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog_add");

			$this->load->view($this->config->item("View_master"),$data);
		}


		function edit($catalog_id=0) {
			$this->check_login();

			if(empty($catalog_id)) {
				$flash_msg	=	"<div class='alert alert-success'>Uh-oh something went wrong! Please try again later</div>";

				$this->session->set_flashdata("message",$flash_msg);
				redirect($this->config->item("base_url").$this->config->item("Cont_catalog"));
			}
		}

		function save() {

			$catalog_validations	=	$this->catalog_validations();

			if(empty($catalog_validations)) {
				$this->add();
			} else {

				$product_data	=	$this->input->post(NULL,true);
				unset($product_data["save"]);

				if(!empty($_FILES["image"])) {
					$max_file_size				=	5*1024*1024;

					$user_data		=	$this->session->userdata("ci_session");

					$user_id		=	$user_data["user_id"];
					$file_name					=	$user_id.'_'.time();

					$config['file_name']		=	$file_name;
					$config['upload_path']		=	'application/assets/images/';
					$config['allowed_types']	=	'jpeg|jpg|png';
					$config['max_size']			=	$max_file_size;
					$config['max_width']		=	1024;
					$config['max_height']		=	768;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('image')) {
							$error = array('error' => $this->upload->display_errors());

							$this->form_validation->set_message("image","",$error);
					} else {
							$data = array('upload_data' => $this->upload->data());

							$product_data["user_id"]	=	$user_id;
							$product_data["image"]		=	$data["upload_data"]["file_name"];

							$product_save_status	=	$this->catalog_lib->save_product($product_data);

							if(!empty($product_save_status)) {
								$flash_msg	=	"<div class='alert alert-success'>Product Added Successfully!!</div>";
							} else {
								$flash_msg	=	"<div class='alert alert-danger'>There was an error in adding the product! Please try agian later!!</div>";
							}

							$this->session->set_flashdata("message",$flash_msg);
							redirect($this->config->item("base_url").$this->config->item("Cont_catalog"));

					}
				}
			}

		}

		function view($product_id=0) {
			if(empty($product_id)) {
				$flash_msg	=	"<div class='alert alert-success'>Uh-oh something went wrong! Please check the product id and try again!!</div>";

				$this->session->set_flashdata("message",$flash_msg);
				redirect($this->config->item("base_url").$this->config->item("Cont_catalog"));
			}

			$data["data"]["product_details"]	=	$this->catalog_lib->get_products($product_id);

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog_view");

			$this->load->view($this->config->item("View_master"),$data);
		}


		function update() {}


		/**
		 * Function used to retrieve details of all catalog
		 * or individual catalog item
		 * 
		 * @param int $catalog_id
		 */
		function get_catalog($catalog_id='') {
			if(!empty($catalog_id)) {
				// get individual catalog data
			} else {
				// get all catalog data
			}
		}

		function check_login() {
			if(empty($this->is_logged_in)) {
				$flash_msg	=	"<div class='alert alert-success'>Please Login to Continue!!</div>";

				$this->session->set_flashdata("message",$flash_msg);
				redirect($this->config->item("base_url").$this->config->item("Cont_login"));
			}
		}

		function catalog_validations($type='add') {
			$this->form_validation->set_rules('name','Product Name','required|trim');
			$this->form_validation->set_rules('description','Description','required|trim');
			$this->form_validation->set_rules('country','Country of Origin','required|trim');
			$this->form_validation->set_rules('contents','Contents','required|trim');
			$this->form_validation->set_rules('price','Price','required|trim');

			if(!empty($type) && $type=='add') {
				// $this->form_validation->set_rules('image','Image','required');
			}

			if($this->form_validation->run() == FALSE) {
				return false;
			} else {
				return true;
			}
		}

		function fetch() {
			if($this->input->post('query')) {
				$query = $this->input->post('query');
			}

			$data['data']["catalog"] = $this->catalog_lib->get_products();

			$this->load->view($this->config->item("View_catalog_list"), $data);
		}

		function manage() {
			$this->check_login();

			$user_data	=	$this->session->userdata("ci_session");
			$user_id	=	$user_data["user_id"];

			$catalog_data	=	$this->catalog_lib->get_products(0,$user_id);

			$data["data"]["catalog"]	=	$catalog_data;

			// Pass required js & css file names
			$data["data"]["js"]		=	array("catalog");
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog_manage");

			$this->load->view($this->config->item("View_master"),$data);
		}

		function delete($product_id=0) {
			$this->check_login();

			if(empty($product_id)) {
				$flash_msg	=	"<div class='alert alert-success'>Uh-oh something went wrong! Please check the product id and try again!!</div>";

				$this->session->set_flashdata("message",$flash_msg);
				redirect($this->config->item("base_url").$this->config->item("Cont_catalog_manage"));
			}

			$update_data	=	array();
			$update_data["status"]	=	0;
			$update_data["deleted"]	=	1;

			$delete_status	=	$this->catalog_lib->update($product_id, $update_data);

			if(!empty($delete_status)) {
				$flash_msg	=	"<div class='alert alert-success'>Product Deleted Successfully!!</div>";
			} else {
				$flash_msg	=	"<div class='alert alert-danger'>There was an error in adding the product! Please try agian later!!</div>";
			}

			$this->session->set_flashdata("message",$flash_msg);
			redirect($this->config->item("base_url").$this->config->item("Cont_catalog_manage"));
		}

	}

?>