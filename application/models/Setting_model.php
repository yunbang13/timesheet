<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function addLevel($idlevel){

		// $this
		$organization = $_SESSION['organization_id'];
		$tingkatan = $this->input->post("inpTingkatan");

		$option = array("description"=>$tingkatan, "organization"=> $organization," idlogin"=> $_SESSION['id_user']);

		if($idlevel>0){
			$this->db->where("idlevel", $idlevel);
			$this->db->where("organization", $organization);
			$query = $this->db->update("tbl_level", $option);
		} else {
			$query = $this->db->insert("tbl_level", $option);
		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function addClass($idclass){

		$organization = $_SESSION['organization_id'];
		$namakelas = $this->input->post("inpNamaKelas");
		$tingkatan = $this->input->post("slxLevel");

		$option = array(
			"description" => $namakelas,
			"idlogin" => $_SESSION['id_user'],
			"level" => $tingkatan,
			"organization" => $organization
		);

		if($idclass>0){
			$this->db->where("idclass", $idclass);
			$this->db->where("organization", $organization);
			$query = $this->db->update("tbl_class", $option);
		} else {
			$query = $this->db->insert("tbl_class", $option);
		}

		if($query){
			return 1;
		} else {
			return 0;
		}

	}

}