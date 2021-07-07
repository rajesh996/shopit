<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->table_products			=	$this->config->item('Table_products');
	}

	function save_product($user_data=array()) {
		$user_data["created_date"]	=	time();

		$this->db->insert($this->table_products,$user_data);

		if($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function get_products($product_id=0, $user_id=0) {
		if(!empty($product_id)) {
			$this->db->where("product_id",$product_id);
		}

		if(!empty($user_id)) {
			$this->db->where("user_id",$user_id);
		}

		$this->db->where("deleted",0);

		$this->db->from($this->table_products);
		$result_data	=	$this->db->get();

		if($result_data->num_rows() > 0) {
			return $result_data->result_array();
		} else {
			return array();
		}
	}

	function update($product_id=0, $update_data=array()) {
		$where["product_id"]	=	$product_id;

		$update_status	=	$this->db->update($this->table_products, $update_data, $where);

		if($update_status) {
			return true;
		}
		return false;
	}
}