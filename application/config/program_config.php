<?php

	$config["View_master"]			=	"master_view";

	$config["View_page_header"]		=	"page_header";
	$config["View_page_footer"]		=	"page_footer";

	$config["assets_folder"]			=	$this->config["base_url"]."application/assets";

	/**
	 * Catalog related files
	 */
	// Controllers
	$config["Cont_catalog"]			=	"catalog";
	$config["Cont_catalog_add"]		=	"catalog/add";
	$config["Cont_catalog_edit"]	=	"catalog/edit";
	$config["Cont_catalog_save"]	=	"catalog/save";
	$config["Cont_catalog_update"]	=	"catalog/update";
	$config["Cont_registration"]	=	"user/register";
	$config["Cont_login"]			=	"user/login";
	$config["Cont_logout"]			=	"user/logout";
	$config["Cont_catalog_manage"]	=	"catalog/manage";
	$config["Cont_catalog_delete"]	=	"catalog/delete";


	// Libraries
	$config["Lib_user_lib"]			=	"user_lib";
	$config["Lib_catalog_lib"]		=	"catalog_lib";


	// Models
	$config["Mod_user_model"]		=	"user_model";
	$config["Mod_catalog_model"]	=	"catalog_model";


	// Tables
	$config["Table_users"]			=	"users";
	$config["Table_products"]		=	"products";


	// Views
	$config["View_catalog"]			=	"catalog_all";
	$config["View_catalog_add"]		=	"catalog_add";
	$config["View_catalog_edit"]	=	"catalog_edit";
	$config["View_catalog_view"]	=	"catalog_view";
	$config["View_catalog_manage"]	=	"catalog_manage";

	$config["View_catalog_list"]	=	"catalog_list";

	$config["View_registration"]	=	"user_registration";
	$config["View_login"]			=	"user_login";

?>