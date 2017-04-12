<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

	public function getdesc($table,$view,$item,$match){

		$this->db->select("$view as view");
		$this->db->where($item,$match);
		$query = $this->db->get($table);

		$row = $query->row();

		if(isset($row)){
			return $row->view;
		}

	}

}	