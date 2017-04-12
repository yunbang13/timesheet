<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("sysadmin_model");

		if(!isset($_SESSION['login'])){
			redirect("login");
		} elseif($_SESSION['role_user']<>999){
			redirect("login");
		}

	}

	public function index(){

		$data["page"] = "Dashboard";
		$data["action"] = "";
		$data["menu_user"] = $this->sysadmin_model->allMenu($_SESSION['role_user'],0);
		$data["submenu"] = $this->sysadmin_model->allMenu($_SESSION['role_user'],1);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("super/mainpage_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

}