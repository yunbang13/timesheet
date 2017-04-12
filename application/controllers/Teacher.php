<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("general_model");
		$this->load->model("sysadmin_model");
		$this->load->model("teacher_model");
		$this->load->model("class_model");
		$this->load->model("student_model");
		
		if(!isset($_SESSION['login'])){
			redirect("login");
		} elseif($_SESSION['role_user']<>8){
			redirect("login");
		}

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

		$data["calendar"] = $this->teacher_model->calendar();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("teacher/dashboard_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_class(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Class";
		$data["action"] = "";

		$data["info_organization"] = $this->nama_organisasi;
		$data["senarai_kelas"] = $this->class_model->allClassTeacher($_SESSION['id_user']);
		$data["jumlah_murid"] = $this->student_model;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("teacher/class_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_student(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Student";
		$data["action"] = "";

		$data["module"] = "adminsekolah";

		$data["info_organization"] = $this->nama_organisasi;
		$data["senarai_murid"] = $this->student_model->allStudent();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("teacher/student_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_attendance(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Attendance";
		$data["action"] = "";

		$data["info_organization"] = $this->nama_organisasi;
		$data["senarai_kelas"] = $this->class_model->allClassTeacher($_SESSION['id_user']);
		$data["jumlah_murid"] = $this->student_model;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("teacher/attendance_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function view_attendance($level,$class){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Attendance";
		$data["action"] = "View";

		$data["info_organization"] = $this->nama_organisasi;
		$data["senarai_untuk_attendance"] = $this->student_model->attendance_list($level,$class);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("teacher/attendance_class_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_processAttendance(){

		$query = $this->student_model->process_attendance();

		// echo $query;

		if($query==1){
			redirect("teacher/manage_attendance");
		}

	}

}