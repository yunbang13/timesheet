<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

	public function allSubject(){

		$this->db->from("tbl_subject");
		$this->db->join("tbl_level","tbl_level.idlevel=tbl_subject.level","LEFT");
		$query = $this->db->get();

		return $query->result();

	}

}