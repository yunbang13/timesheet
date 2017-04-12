<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sysadmin_model extends CI_Model {

	public function allMenu($role,$type){

		$this->db->where("organization_type", $_SESSION['organization_type']);
		$this->db->where("type", $type);
		$this->db->where("role_user", $role);
		$query = $this->db->get("tbl_menu");

		return $query->result();

	}

	public function allRole($idrole){

		if($idrole==2){
			if($_SESSION['organization_type']==1){
				$role = array("999", "2");
			} else {
				$role = array("999", "2");
			}
		} elseif($idrole==3){
			$role = array("999", "2", "3");
		} elseif($idrole==6){
			$role = array("999", "2", "3", "6");
		}
		$this->db->where_not_in("id ", $role);
		$this->db->where("organization_type", $_SESSION['organization_type']);
		$query = $this->db->get("tbl_role");

		return $query->result();

	}

	public function allUser($idorganization){

		$role = array("999", "2");
		$this->db->select("fullname, email_user, description as desc_role, tbl_login.id as idlogin, status_user, role_user");
		$this->db->where("organization", $idorganization);
		$this->db->where_not_in("role_user ", $role);
		$this->db->from("tbl_login");
		$this->db->join("tbl_role", "tbl_role.id=tbl_login.role_user", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function allLevel($organization){

		$this->db->where("organization", $organization);
		$query = $this->db->get("tbl_level");

		return $query->result();

	}

	public function allClass($organization){

		$this->db->group_by(array("tbl_class.level", "tbl_class.description")); 
		$this->db->select("tbl_class.description as desc_class, tbl_level.description as desc_level, idclass");
		$this->db->where("tbl_class.organization", $organization);
		$this->db->from("tbl_class");
		$this->db->join("tbl_level","tbl_class.level=tbl_level.idlevel","LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function allDept($orgaID){

		$this->db->where("organization", $orgaID);
		$query = $this->db->get("tbl_dept");

		return $query->result();

	}

	public function process_newdept(){

		$data = array("description"=>$this->input->post("inpDescriptionRoleBaru"), "organization"=> $_SESSION['organization_id'], "idlogin"=> $_SESSION['id_user']);

		$query = $this->db->insert("tbl_dept", $data);

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function process_editdept($iddept){

		$data = array("description"=>$this->input->post("inpDescriptionRoleBaru"), "organization"=> $_SESSION['organization_id'], "idlogin"=> $_SESSION['id_user']);

		$this->db->where("id", $iddept);
		$query = $this->db->update("tbl_dept", $data);

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function infoUser($iduser){

		$this->db->where("id", $iduser);
		$query = $this->db->get("tbl_login");

		return $query->result();

	}

	public function namaOrg($iduser){

		$this->db->select("organization, description");
		$this->db->where("tbl_login.id", $iduser);
		$this->db->from("tbl_login");
		$this->db->join("tbl_organization","tbl_login.organization=tbl_organization.id", "LEFT");
		$query = $this->db->get();

		return $query->result();

	}

	public function infoDept($iddept){

		$this->db->where("id", $iddept);
		$query = $this->db->get("tbl_dept");

		return $query->result();

	}

	public function new_subject($idsubject){

		$code = $this->input->post("inpSubjectCode");
		$subject = $this->input->post("inpSubjectName");
		$level = $this->input->post("slxLevel");

		$values = array(
			"subject_code"=>$code,
			"subject"=>$subject,
			"level"=>$level
		);

		if($idsubject>0){
			$this->db->where("idsubject", $idsubject);
			$query = $this->db->update("tbl_subject", $values);
		} else {
			$query = $this->db->insert("tbl_subject", $values);
		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	// public function pilihclass($level){

	// 	$this->db->where("level", $level);
	// 	$query = $this->db->get("tbl_class");

	// 	foreach($query->result() as $row){

	// 		return "<option value='".$row->idclass."'>".$row->description."</option>";

	// 	}

	// }

}