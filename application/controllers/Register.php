<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("register_model");

	}

	public function index(){

		$data["all_negeri"] = $this->register_model->allNegeri();

		$this->load->view("mainpage/header_view");
		$this->load->view("register/register_view", $data);
		$this->load->view("mainpage/footer_view");

	}

	public function verify(){

		$reg = $this->register_model->verify();

		if($reg==1){
			redirect("sysadmin");
		}

	}

	public function check_email(){

		$query = $this->register_model->check_email();

		echo $query;

	}

	public function getDistrict($kodnegeri){

		header("Content-Type: application/json");

		$query = $this->register_model->district($kodnegeri);

		echo json_encode($query);

	}

}