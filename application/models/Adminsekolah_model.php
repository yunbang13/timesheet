<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsekolah_model extends CI_Model {

	public function calendar(){

		$this->load->library('calendar');

		$year = date("Y");
		$month = date("m");

		return $this->calendar->generate($year, $month);

	}

}