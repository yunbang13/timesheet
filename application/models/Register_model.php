<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function verify(){

		$organization = $this->input->post("orgName");
		$state = $this->input->post("slxState");
		$district = $this->input->post("slxDistrict");

		$insert = $this->db->insert("tbl_organization", array("description"=>$organization, "negeri"=> $state, "daerah"=> $district));

		$this->db->select_max("id");
		$qry = $this->db->get("tbl_organization");

		$row = $qry->row();

		if(isset($row)){
			$idOrg = $row->id;
		}

		$name = $this->input->post("inpName");
		$email = $this->input->post("emailLogin");
		$password = $this->input->post("passwordLogin");
		$confirm = $this->input->post("passwordLoginConfirm");
		$type = $this->input->post("slxOrganizationType");
		$katalaluan = md5("time".$password."sheet");

		$hash = password_hash($katalaluan, PASSWORD_BCRYPT, array("cost" => 12));

		$management = $this->input->post("rdoRegManagement");

		$role_user = 2;

		if($management==1 and $type==1){
			$role_user = 9;
		} elseif($management==1 and $type==2){
			$role_user = 10;
		}

		$data = array(
			"fullname" => $name,
			"email_user" => $email,
			"katanama" => $email,
			"katalaluan" => $katalaluan,
			"password_hash" => $hash,
			"status_user" => 9,
			"role_user" => $role_user,
			"organization" => $idOrg,
			"organization_type" => $type
		);

		$query = $this->db->insert("tbl_login", $data);

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function allNegeri(){

		$query = $this->db->get("tknegeri");

		return $query->result();

	}

	public function check_email(){

		$email = $this->input->post("email");

		$this->db->select("email_user");
		$this->db->where("email_user", $email);
		$query = $this->db->get("tbl_login");

		$data = $query->row();

		if(isset($data)){
			return 1; // kalau data ada 
		} else {
			return 0;
		}

	}

	public function district($kodnegeri){

		$this->db->select("KodDaerah, Daerah");
		$this->db->where("KodNegeri", $kodnegeri);
		$query = $this->db->get("tkdaerah");

		return $query->result();

	}

}