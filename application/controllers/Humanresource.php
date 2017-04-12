<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Humanresource extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if(!isset($_SESSION['login'])){
			redirect("login");
		} elseif($_SESSION['role_user']<>3){
			redirect("login");
		}

		$this->load->helper("url");
		$this->load->model("hr_model");
		$this->load->model("sysadmin_model");
		$this->load->model("general_model");
		$this->load->model("employee_model");

		$this->nama_organisasi = $this->general_model->getdesc("tbl_organization","description","id",$_SESSION['organization_id']);
		$this->menu = $this->sysadmin_model->allMenu($_SESSION['role_user'],0);
		$this->submenu = $this->sysadmin_model->allMenu($_SESSION['role_user'],1);
	}

	public function index(){

		$data["menu_user"] = $this->menu;

		$data["page"] = "Dashboard";
		$data["action"] = "";

		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("hr/dashboard_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_employee(){

		$data["menu_user"] = $this->menu;

		$data["page"] = "Employee";
		$data["action"] = "";

		$data["info_organization"] = $this->nama_organisasi;
		$data["maklumat_employee"] = $this->employee_model->allEmployee($_SESSION['role_user']);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("hr/manage_employee_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_employee(){

		$data["menu_user"] = $this->menu;

		$data["page"] = "Employee";
		$data["action"] = "New Employee";

		$data["module"] = "humanresource";
		$data["page_form"] = "page_addnewemp";

		$data["info_organization"] = $this->nama_organisasi;

		$data["role_user"] = $this->sysadmin_model->allRole($_SESSION['role_user']);
		$data["dept_user"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);

		$data["maklumat_employee"] = $this->employee_model->employeeInfo(0);
		$data["employeeID"] = $this->employee_model->employeeID();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("employee/new_employee_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function edit_employee($idemployee){

		$string = explode("-", $idemployee);
		$data["idEmp"] = $string[0];
		$data["namaEmp"] = $string[1];

		$data["menu_user"] = $this->menu;

		$data["page"] = "Employee";
		$data["action"] = "Edit Employee";

		$data["module"] = "humanresource";
		$data["page_form"] = "page_editemp";

		$data["info_organization"] = $this->nama_organisasi;

		$data["role_user"] = $this->sysadmin_model->allRole($_SESSION['role_user']);
		$data["dept_user"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);

		$data["maklumat_employee"] = $this->employee_model->employeeInfo($string[0]);
		// $data["employeeID"] = $this->employee_model->employeeID();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("employee/new_employee_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewemp(){

		$query = $this->employee_model->process_newemp(0);

		if($query==1){
			redirect("humanresource/manage_employee");
		}
		
	}

	public function page_editemp(){

		$idlogin = $this->input->post("hdnID");

		$query = $this->employee_model->process_newemp($idlogin);

		if($query==1){
			redirect("humanresource/manage_employee");
		}

	}

}