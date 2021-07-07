<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_lib {

	function __construct($params= array())	{
		$this->CI 	=& get_instance();

		$this->CI->load->model($this->CI->config->item('Mod_catalog_model'));
		if(count($params) > 0){	$this->initialize($params);}
	}

	function initialize($params){
		if (count($params) > 0)	{
			foreach ($params as $key => $val){
				$this->$key = $val;
			}
		}
	}


	/**
	 * Function to save new product details
	 * 
	 * @param array $product_data
	 * 
	 * @return boolean
	 */
	function save_product($product_data=array()) {
		return $this->CI->catalog_model->save_product($product_data);
	}


	/**
	 * Function to get single or multiple products at once
	 * 
	 * @param int $product_id
	 * @param int $user_id
	 * 
	 * @return array
	 */
	function get_products($product_id=0, $user_id=0) {
		$product_details	=	$this->CI->catalog_model->get_products($product_id,$user_id);

		return $product_details;
	}

	function update($product_id=0, $update_data=array()) {
		if(empty($product_id) || empty($update_data)) {
			return false;
		}

		return $this->CI->catalog_model->update($product_id, $update_data);
	}
}