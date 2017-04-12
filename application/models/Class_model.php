<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {


	public function allClass($idteacher){

		$this->db->where("idemp", $idteacher);
		$query = $this->db->get("tbl_assign_class");

		return $query->num_rows();

	}

	public function allClassTeacher($idteacher){

		$this->db->select("tbl_level.description as desc_level, tbl_class.description as desc_class, tbl_assign_class.level, tbl_assign_class.class");
		$this->db->where("idemp", $idteacher);
		$this->db->from("tbl_assign_class");
		$this->db->join("tbl_level","tbl_assign_class.level=tbl_level.idlevel","LEFT");
		$this->db->join("tbl_class","tbl_assign_class.class=tbl_class.idclass","LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function process_newclass($idassign){

		$idteacher = $this->input->post("hdnIDTeacher");
		$level = $this->input->post("slxLevel");
		$class = $this->input->post("slxClass");

		$array = array(
			"idemp"=> $idteacher,
			"level" => $level,
			"class" => $class
		);

		if($idassign>0){
			$this->db->where("idassign", $idassign);
			$query = $this->db->update("tbl_assign_class", $array);
		} else {
			$query = $this->db->insert("tbl_assign_class", $array);
		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

}