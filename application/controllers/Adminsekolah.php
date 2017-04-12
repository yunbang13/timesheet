<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsekolah extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("sysadmin_model");
		$this->load->model("register_model");
		$this->load->model("general_model");
		$this->load->model("employee_model");
		$this->load->model("adminsekolah_model");
		$this->load->model("student_model");
		$this->load->model("class_model");
		// $this->load->model("calendar_model");

		if(!isset($_SESSION['login'])){
			redirect("login");
		} elseif($_SESSION['role_user']<>6 and $_SESSION['role_user']<>2){
			redirect("login");
		}
		
		// echo $_SESSION['organization_id'];

		$this->nama_organisasi = $this->general_model->getdesc("tbl_organization","description","id",$_SESSION['organization_id']);
		$this->menu = $this->sysadmin_model->allMenu($_SESSION['role_user'],0);
		$this->submenu = $this->sysadmin_model->allMenu($_SESSION['role_user'],1);

	}

	public function index(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Dashboard";
		$data["action"] = "";

		$data["info_organization"] = $this->nama_organisasi;

		$data["calendar"] = $this->adminsekolah_model->calendar();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/dashboard_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_teachers(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Teachers";
		$data["action"] = "";

		$data["module"] = "adminsekolah";

		$data["all_user"] = $this->employee_model->allEmployee($_SESSION['role_user']);
		$data["info_organization"] = $this->nama_organisasi;
		$data["jumlah_kelas"] = $this->class_model;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("sysadmin/list_user_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_user(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Teachers";
		$data["action"] = "New";

		$data["module"] = "adminsekolah";
		$data["page_form"] = "page_addnewuser";

		$data["role_user"] = $this->sysadmin_model->allRole($_SESSION['role_user']);
		$data["dept_user"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);
		$data["maklumat_employee"] = $this->employee_model->employeeInfo(0);
		$data["employeeID"] = $this->employee_model->employeeID();
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view", $data);
		$this->load->view("employee/new_employee_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewuser(){

		$query = $this->employee_model->process_newemp(0);
		
		// die($query);

		if($query==1){
			redirect("adminsekolah/manage_teachers");
		}

	}

	public function manage_kelas($idlogin,$fullname){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Class";
		$data["action"] = "Assign";

		$data["module"] = "adminsekolah";

		$data["all_user"] = $this->employee_model->allEmployee($_SESSION['role_user']);
		$data["info_organization"] = $this->nama_organisasi;

		// echo $this->nama_organisasi;

		$data["maklumat_employee"] = $this->employee_model->employeeInfo($idlogin);
		$data["maklumat_kelas"] = $this->employee_model->employeeClass($idlogin);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/list_teacher_class_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_class($idlogin){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Class";
		$data["action"] = "New";

		$data["module"] = "adminsekolah";

		$data["nama_cikgu"] = $this->general_model->getdesc("tbl_login","fullname","id",$idlogin);
		$data["idlogin"] = $idlogin;
		$data["info_organization"] = $this->nama_organisasi;


		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);
		$data["all_class"] = $this->sysadmin_model->allClass($_SESSION['organization_id']);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/add_new_class_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewclass(){

		$idteacher = $this->input->post("hdnIDTeacher");
		$namateacher = $this->input->post("hdnNamaCikgu");
		$query = $this->class_model->process_newclass(0);

		if($query==1){
			redirect("adminsekolah/manage_kelas/".$idteacher."/".$namateacher);
		}

	}

	public function manage_student(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Student";
		$data["action"] = "";

		$data["module"] = "adminsekolah";

		$data["info_organization"] = $this->nama_organisasi;

		$data["all_student"] = $this->student_model->allStudent();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("student/list_student_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_student(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Student";
		$data["action"] = "New";

		$data["module"] = "adminsekolah";

		$data["info_organization"] = $this->nama_organisasi;

		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);
		$data["all_class"] = $this->sysadmin_model->allClass($_SESSION['organization_id']);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("student/add_student_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewstudent(){

		$query = $this->student_model->process_newstudent(0);

		if($query==1){
			redirect("adminsekolah/manage_student");
		}

	}

}