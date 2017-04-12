<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

	public function level($kelas){

		$this->db->select("tbl_class.description as desc_class, tbl_class.idclass");
		$this->db->where("tbl_class.level", $kelas);
		$this->db->from("tbl_class");
		$this->db->join("tbl_level", "tbl_class.level=tbl_level.idlevel", "LEFT");
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		} else {
			return 0;
		}

	}

}