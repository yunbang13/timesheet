<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("login_model");
		$this->load->helper("url");

	}

	public function index(){

		
		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("login/login_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function verify(){

		$role = $this->login_model->process();

		if($role==999){
			redirect("super");
		} elseif($role==2) {
			redirect("sysadmin");
		} elseif($role==3){
			redirect("humanresource");
		} elseif($role==4){
			redirect("hod");
		} elseif($role==6){
			redirect("adminsekolah");
		} elseif($role==7){
			redirect("headmaster");
		} elseif($role==8){
			redirect("teacher");
		} else {
			redirect("login");
		}

	}

}	