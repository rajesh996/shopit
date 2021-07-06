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

			// Models
		}

		/**
		 * Default function
		 */
		function index() {

			$data["data"]["catalog_data"]	=	array();

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog");

			$this->load->view($this->config->item("View_master"),$data);
		}


		function add() {
			$data["data"]["catalog_data"]	=	array();

			// Pass required js & css file names
			$data["data"]["js"]		=	array();
			$data["data"]["css"]	=	array();

			$data["data"]["view"]	=	$this->config->item("View_catalog_add");

			$this->load->view($this->config->item("View_master"),$data);
		}


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

	}

?>