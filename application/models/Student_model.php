<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function allStudent(){

		$this->db->select("studName, tbl_level.description as desc_level, tbl_class.description as desc_class, studID");
		$this->db->where("tbl_student.organization", $_SESSION['organization_id']);
		$this->db->where("tbl_student.organization_type", $_SESSION['organization_type']);
		$this->db->from("tbl_student");
		$this->db->join("tbl_class", "tbl_class.idclass=tbl_student.studClass", "LEFT");
		$this->db->join("tbl_level", "tbl_level.idlevel=tbl_student.studLevel", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function jumlah_murid($level,$class){

		$this->db->where("studLevel", $level);
		$this->db->where("studClass", $class);
		$query = $this->db->get("tbl_student");

		return $query->num_rows();
	}

	public function attendance_list($level, $class){

		$this->db->where("studLevel", $level);
		$this->db->where("studClass", $class);
		$query = $this->db->get("tbl_student");

		return $query->result();

	}


	public function process_newstudent($idstudent){

		$studname = $this->input->post("inpStudentName");
		$studic = $this->input->post("inpStudentNoKP");
		$studdob = $this->input->post("inpStudentDOB");
		$level = $this->input->post("slxLevel");
		$class = $this->input->post("slxClass");

		$array = array(
			"studName"=>$studname,
			"studID"=>$studic,
			"studDOB"=>$studdob,
			"studLevel"=>$level,
			"studClass"=>$class,
			"organization"=>$_SESSION['organization_id'],
			"organization_type"=>$_SESSION['organization_type']
		);

		if($idstudent>0){
			$this->db->where("idstud", $idstudent);
			$query = $this->db->update("tbl_student", $array);
		} else {
			$query = $this->db->insert("tbl_student", $array);
		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function process_attendance(){

		foreach($this->input->post("hdnStudID") as $v=>$value){

			$attend = $this->input->post("slxAttend")[$v];
			$reason = $this->input->post("txtAttendance")[$v];

			// echo $attend;
			$this->db->where("studID", $value);
			$check = $this->db->get("tbl_student_attendance");

			$row = $check->row();

			$array = array(
				"studID"=>$value,
				"studAttend"=>$attend,
				"attendDate"=>date("Y-m-d"),
				"attendReason"=>$reason,
				"teachID"=>$_SESSION['id_user'],
				"saved_date"=>date("Y-m-d")
			);

			if(isset($row)){ // kalau data ada
				$this->db->where("studID", $value);
				$query = $this->db->update("tbl_student_attendance", $array);
			} else {
				$query = $this->db->insert("tbl_student_attendance", $array);
			}

		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

}