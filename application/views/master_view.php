<?php

	$this->load->view($this->config->item("View_page_header"));


	echo "<div class='row'><div class='container'>";

	echo $this->session->flashdata('message');

	echo validation_errors('<div class="alert alert-danger">','</div>');
	
	if(!empty($data["view"])) {
		include $data["view"].".php";
	}
	echo "</div></div>";

	$this->load->view($this->config->item("View_page_footer"));

?>