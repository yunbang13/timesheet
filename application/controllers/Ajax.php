<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("ajax_model");
	}

	public function panggil_level(){

		header("Content-Type: application/json");

		$kelas = $this->input->post("kelas");

		$query = $this->ajax_model->level($kelas);
		// echo $query;
		echo json_encode($query, true);

	}

}