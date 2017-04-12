<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function process(){

		$username = $this->input->post("emailLogin");
		$katalaluan = $this->input->post("passwordLogin");
		$password = md5("time".$katalaluan."sheet");

		$query = "SELECT fullname, description, role_user, tbl_login.id, organization, dept_user, tbl_login.organization_type, emp_callname, password_hash FROM tbl_login LEFT JOIN tbl_role ON tbl_login.role_user=tbl_role.id LEFT JOIN tbl_employee ON tbl_login.id=tbl_employee.idlogin WHERE katanama=? and katalaluan=? and status_user='9'";
		$result = $this->db->query($query, array($username,$password));

		$row = $result->row();
		if(isset($row)){
			$role_user = $row->role_user;
			$password_hash = password_verify($password, $row->password_hash);
			if($password_hash){
				$_SESSION['nama_user'] = $row->fullname;
				$_SESSION['nama_role'] = $row->description;
				$_SESSION['role_user'] = $role_user;
				$_SESSION['id_user'] = $row->id;
				$_SESSION['organization_id'] = $row->organization;
				$_SESSION['organization_type'] = $row->organization_type;
				$_SESSION['call_name'] = $row->emp_callname;
				
				if($role_user==4){
					$_SESSION['dept_user'] = $row->dept_user;
				}

				$_SESSION['login'] = 1;

				$this->update_login($row->id);

				return $role_user;
			} else {
				return 0;
			}
		} else {
			return 0;
		}

	}

	function update_login($id){

		date_default_timezone_set("Asia/Kuala_Lumpur");

		$data = array(
			"last_login" => date("Y-m-d H:i:s"),
			"idlogin" => $id
		);

		$query = $this->db->insert("tbl_attendance", $data);

		$this->db->select_max("id");
		$this->db->where("idlogin", $id);
		$user = $this->db->get("tbl_attendance");

		$row = $user->row();

		if(isset($row)){
			$_SESSION['id_login'] = $row->id;
		}

	}

}