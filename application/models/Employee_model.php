<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function allEmployee($roletukangnaktengok){



		$this->db->select("fullname, tbl_role.description as desc_role, tbl_dept.description as desc_dept, status_user, emp_epfno, email_user, tbl_login.id as idlogin, emp_phone, emp_phone2, role_user");

		if($roletukangnaktengok==3){
			$role = array(3, 999, 2);
		} elseif($roletukangnaktengok==4){
			$role = array(3, 999, 2, 4);
			$this->db->where("dept_user", $_SESSION['dept_user']);
		} elseif($roletukangnaktengok==6){
			$role = array(3, 999, 2, 4, 6);
		} elseif($roletukangnaktengok==2){
			$role = array(3, 999, 2);
		}

		
		$this->db->where_not_in("role_user", $role);
		$this->db->where("tbl_login.organization", $_SESSION['organization_id']);
		$this->db->from("tbl_login");
		$this->db->join("tbl_employee", "tbl_login.id=tbl_employee.idlogin", "LEFT");
		$this->db->join("tbl_role", "tbl_role.id=tbl_login.role_user", "LEFT");
		$this->db->join("tbl_dept", "tbl_dept.id=tbl_login.dept_user", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	// panggil maklumat employee untuk view dalam form
	public function employeeInfo($idemployee){

		$this->db->where("tbl_login.id", $idemployee);
		$this->db->from("tbl_login");
		$this->db->join("tbl_employee", "tbl_login.id=tbl_employee.idlogin", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function employeeClass($idlogin){

		$this->db->select("tbl_class.description as desc_class, tbl_level.description as desc_level");
		$this->db->where("idemp", $idlogin);
		$this->db->from("tbl_assign_class");
		$this->db->join("tbl_login", "tbl_login.id=tbl_assign_class.idemp","LEFT");
		$this->db->join("tbl_class", "tbl_class.idclass=tbl_assign_class.class", "LEFT");
		$this->db->join("tbl_level", "tbl_level.idlevel=tbl_assign_class.level", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}


	// untuk counter employee ID
	public function employeeID(){

		$organization = $_SESSION['organization_id'];

		$this->db->select("counter");
		$this->db->where("organization", $organization);
		$query = $this->db->get("tbl_count");

		$data = $query->row();

		if(isset($data)){
			return $data->counter + 1;
		} else {
			return 1;
		}
	}


	// simpan + edit maklumat employee
	public function process_newemp($idemp){

		$organization_type = $_SESSION['organization_type'];
		$organization = $_SESSION['organization_id'];
		$iduser = $_SESSION['id_user'];
		$username = $this->input->post('inpUsernameBaru');
		$password = $this->input->post('inpPasswordBaru');
		$newpassword = md5("time".$password."sheet");

		$hash = password_hash($newpassword, PASSWORD_BCRYPT, array("cost" => 12));

		$employeeID = $this->input->post("inpEmployeeIDBaru");
		$employeeDOB = $this->input->post("inpDOBEmpBaru");
		$gender = $this->input->post("slxGender");
		$fullname = $this->input->post("inpFullNameBaru");
		$callname = $this->input->post("inpCallNameEmpBaru");
		$address = $this->input->post("txtEmpAddressBaru");
		$telephone = $this->input->post("inpTelephoneEmpBaru");
		$telephone2 = $this->input->post("inpTelephoneEmpBaru2");
		$salary = $this->input->post("inpSalaryEmpBaru");
		$noEPF = $this->input->post("inpNoEPFEmpBaru");
		$percentEPF = $this->input->post("inpEPFPercentEmpBaru");
		$amountEPF = $this->input->post("inpEPFAmountEmpBaru");
		$startWork = $this->input->post("inpStartWorkEmpbaru");
		$endWork = $this->input->post("inpEndWorkEmpbaru");
		$normalLeave = $this->input->post("inpLeaveEmpBaru");
		$medicalLeave = $this->input->post("inpMedicalLeave");
		$maternityLeave = $this->input->post("inpBeranakEmpBaru");
		$dept_user = $this->input->post("inpDepartmentBaru");
		if($dept_user==""){
			$dept_user = 9;
		}
		$role_user = $this->input->post("slxRoleBaru");
		$post_user = $this->input->post("inpPositionBaru");
		$status_user = $this->input->post("chkStatus");
		$nokp = $this->input->post("inpNoKP");

		if($password<>""){
			$login = array(
				"katanama" => $username,
				"katalaluan" => $newpassword,
				"password_hash" => $hash,
				"status_user" => $status_user,
				"role_user" => $role_user,
				"fullname" => $fullname,
				"email_user" => $username,
				"dept_user" => $dept_user,
				"post_user" => $post_user,
				"organization" => $organization,
				"organization_type" => $organization_type
			);
		} else {
			$login = array(
				"katanama" => $username,
				"status_user" => $status_user,
				"role_user" => $role_user,
				"fullname" => $fullname,
				"email_user" => $username,
				"dept_user" => $dept_user,
				"post_user" => $post_user,
				"organization" => $organization,
				"organization_type" => $organization_type
			);
		}

		if($idemp>0){
			$this->db->where("id", $idemp);
			$insertLogin = $this->db->update("tbl_login", $login);
		} else {
			$insertLogin = $this->db->insert("tbl_login", $login);
		}

		
		if($insertLogin){

			if($idemp>0){
				$idlogin = $idemp;
			} else { // dapatkan max id
				$this->db->select_max("id");
				$this->db->where("email_user", $username);
				$this->db->where("organization", $organization);
				$query = $this->db->get("tbl_login");

				$row = $query->row();

				if(isset($row)){
					$idlogin = $row->id;
				}
			}

			$employee = array(
				"emp_id" => $employeeID,
				"emp_nokp" => $nokp,
				"emp_dob" => $employeeDOB,
				"emp_gender" => $gender,
				"emp_fullname" => $fullname,
				"emp_callname" => $callname,
				"emp_address" => $address,
				"emp_phone" => $telephone,
				"emp_phone2" => $telephone2,
				"emp_salary" => $salary,
				"emp_epfno" => $noEPF,
				"emp_epf_percent" => $percentEPF,
				"emp_epf_value" => $amountEPF,
				"emp_startwork" => $startWork,
				"emp_endwork" => $endWork,
				"emp_leave" => $normalLeave,
				"emp_medical" => $medicalLeave,
				"emp_maternity" => $maternityLeave,
				"saved_by" => $iduser,
				"saved_date" => date("Y-m-d"),
				"idlogin" => $idlogin
			);

			if($idemp>0){
				array_pop($employee);
				$this->db->where("idlogin", $idlogin);
				$insertEmp = $this->db->update("tbl_employee", $employee);
			} else {
				$insertEmp = $this->db->insert("tbl_employee", $employee);

				// check table count, kalau data dah ada, update counter (berlaku masa insert je)

				$this->db->where("organization", $organization);
				$check = $this->db->get("tbl_count");

				$row = $check->row();

				if(isset($row)){
					$this->db->set("counter","counter + 1", FALSE);
					$this->db->where("description", "employee");
					$this->db->where("organization", $organization);
					$this->db->update("tbl_count");
				} else {
					$this->db->insert("tbl_count", array("description"=> "employee", "counter"=> 1, "organization"=> $_SESSION['organization_id']));
				}
			}

			return 1;
		} else {
			return 0;
		}

	}

}