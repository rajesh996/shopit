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
	$config["Cont_registration"]	=	"user/register";
	$config["Cont_login"]			=	"user/login";
	$config["Cont_logout"]			=	"user/logout";


	// Libraries
	$config["Lib_user_lib"]			=	"user_lib";


	// Models
	$config["Mod_user_model"]		=	"user_model";


	// Tables
	$config["Table_users"]			=	"users";


	// Views
	$config["View_catalog"]			=	"catalog_all";
	$config["View_catalog_add"]		=	"catalog_add";
	$config["View_catalog_edit"]	=	"catalog_edit";
	$config["View_catalog_view"]	=	"catalog_view";

	$config["View_registration"]	=	"user_registration";
	$config["View_login"]			=	"user_login";

?>