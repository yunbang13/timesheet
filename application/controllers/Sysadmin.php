<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sysadmin extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("sysadmin_model");
		$this->load->model("register_model");
		$this->load->model("general_model");
		$this->load->model("employee_model");
		$this->load->model("setting_model");
		$this->load->model("class_model");
		$this->load->model("subject_model");
		$this->load->model("student_model");
		
		if(!isset($_SESSION['login'])){
			redirect("login");
		} elseif($_SESSION['role_user']<>2){
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

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("sysadmin/mainpage_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_users(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		if($_SESSION['organization_type']==1){
			if($_SESSION['role_user']==2){
				$data["page"] = "Staff";
			} else {
				$data["page"] = "Teachers";
			}
		} else {
			$data["page"] = "Users";
		}
		
		$data["action"] = "";
		$data["module"] = "sysadmin";
 
		$data["all_user"] = $this->sysadmin_model->allUser($_SESSION['organization_id']);
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

		$data["page"] = "Staff";
		$data["action"] = "New Staff";

		$data["module"] = "sysadmin";
		$data["page_form"] = "page_addnewuser";

		$data["role_user"] = $this->sysadmin_model->allRole($_SESSION['role_user']);
		$data["dept_user"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);
		$data["maklumat_employee"] = $this->employee_model->employeeInfo(0);
		$data["employeeID"] = $this->employee_model->employeeID();
		$data["info_organization"] = $this->nama_organisasi;
		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);
		$data["all_class"] = $this->sysadmin_model->allClass($_SESSION['organization_id']);

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

	public function edit_user($info){

		$iduser = explode("-", $info);

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Users";
		$data["action"] = "Edit user";

		$data["page_process"] = "page_editnewuser";

		$data["role_user"] = $this->sysadmin_model->allRole();
		$data["dept_user"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);
		$data["info_user"] = $this->sysadmin_model->infoUser($iduser[0]);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view", $data);
		$this->load->view("sysadmin/new_user_view");
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function manage_dept(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Department";
		$data["action"] = "";

		$data["all_dept"] = $this->sysadmin_model->allDept($_SESSION['organization_id']);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view", $data);
		$this->load->view("sysadmin/list_dept_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_dept(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Department";
		$data["action"] = "New Department";

		$data["page_process"] = "page_addnewdept";
		$data["dept_info"] = $this->sysadmin_model->infoDept(0);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view", $data);
		$this->load->view("sysadmin/new_dept_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function edit_dept($info){

		$iduser = explode("-", $info);

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Department";
		$data["action"] = "Edit Department";

		$data["dept_info"] = $this->sysadmin_model->infoDept($iduser[0]);
		$data["page_process"] = "page_editdept";

		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view", $data);
		$this->load->view("sysadmin/new_dept_view", $data);
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

		$data["module"] = "sysadmin";

		$data["all_class"] = $this->sysadmin_model->allClass($_SESSION['organization_id']);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/list_class_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewclass(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Class";
		$data["action"] = "New";

		$data["module"] = "sysadmin";

		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/add_class_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function process_newclass(){

		$query = $this->setting_model->addClass(0);

		if($query==1){
			redirect("sysadmin/manage_class");
		}

	}

	public function manage_level(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Level";
		$data["action"] = "";

		$data["module"] = "sysadmin";

		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);
		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/list_level_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewlevel(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Level";
		$data["action"] = "New";

		$data["module"] = "sysadmin";

		$data["info_organization"] = $this->nama_organisasi;

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("adminsekolah/add_level_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function process_newlevel(){

		$query = $this->setting_model->addLevel(0);

		if($query==1){
			redirect("sysadmin/manage_level");
		}

	}

	public function page_addnewuser(){

		$query = $this->employee_model->process_newemp(0);
		
		// die($query);

		if($query==1){
			redirect("sysadmin/manage_users");
		}

	}

	public function page_editnewuser(){

		$iduser = $this->input->post("hdnIDUser");
		$query = $this->sysadmin_model->process_edituser($iduser);

		if($query==1){
			redirect("sysadmin/manage_users");
		}


	}

	public function page_addnewdept(){

		$query = $this->sysadmin_model->process_newdept();

		if($query==1){
			redirect("sysadmin/manage_dept");
		}

	}

	public function page_editdept(){

		$iddept = $this->input->post("hdnIDDept");
		$query = $this->sysadmin_model->process_editdept($iddept);

		if($query==1){
			redirect("sysadmin/manage_dept");
		}

	}

	// ajax

	public function pilih_class(){

		$level = $this->input->post("level");
		$query = $this->sysadmin_model->pilihclass($level);

		echo $query;

	}

	// end ajax

	public function manage_subject(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Subject";
		$data["action"] = "";

		$data["module"] = "sysadmin";

		$data["info_organization"] = $this->nama_organisasi;

		$data["subject_list"] = $this->subject_model->allSubject();

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("subject/list_subject_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function new_subject(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Subject";
		$data["action"] = "New";

		$data["module"] = "sysadmin";

		$data["info_organization"] = $this->nama_organisasi;

		$data["all_level"] = $this->sysadmin_model->allLevel($_SESSION['organization_id']);

		$this->load->view("mainpage/header_view");
		$this->load->view("mainpage/canvas_side_start");
		// tempat sidebar
		$this->load->view("mainpage/sidebar_view", $data);
		$this->load->view("mainpage/canvas_main_start");
		// top bar
		$this->load->view("mainpage/topbar_view");
		$this->load->view("subject/new_subject_view", $data);
		// main
		$this->load->view("mainpage/canvas_main_end");
		$this->load->view("mainpage/canvas_side_end");
		$this->load->view("mainpage/footer_view");

	}

	public function page_addnewsubject(){

		$query = $this->sysadmin_model->new_subject(0);

		if($query==1){
			redirect("sysadmin/manage_subject");
		}

	}

	public function manage_student(){

		$data["menu_user"] = $this->menu;
		$data["submenu"] = $this->submenu;

		$data["page"] = "Student";
		$data["action"] = "";

		$data["module"] = "sysadmin";

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

}